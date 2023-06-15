<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // if (request('search')) {
        //     $data = DB::table('users')->where('username', 'like', '%' . request('search') . '%')
        //         ->orWhere('email', 'like', '%' . request('search') . '%')
        //         ->join('role', 'users.role_id', '=', 'role.id_role')->paginate(5);
        // } else

        $data = DB::table('users')->where('username', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%')
            ->orWhere('role', 'like', '%' . request('search') . '%')
            ->join('role', 'users.role_id', '=', 'role.id_role')->paginate(5);

        return view('admin.account', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sendEmail($receiver, $subject, $body, $body2)
    {
        if ($this->isOnline()) {
            $email = [
                'recepient' => $receiver,
                'fromEmail' => 'psychologicaltest@monstergroup.com',
                'fromName' => 'Monster Group',
                'subject' => $subject,
                'body' => $body,
                'body2' => $body2,
            ];

            Mail::send('template_email', $email, function ($message) use ($email) {
                $message->from($email['fromEmail'], $email['fromName']);
                $message->to($email['recepient']);
                $message->subject($email['subject']);
            });
        }
    }


    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'email' => 'required|min:1|max:255|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role_id' => 'required',
            'status' => 'required',
        ]);

        $receiver = $validatedData['email'];
        $subject = 'Account Information';
        $body = $validatedData['username'];
        $body2 = $validatedData['password'];

        User::create($validatedData);

        $this->sendEmail($receiver, $subject, $body, $body2);
        return redirect('/account')->with('success', 'Data telah berhasil ditambahkan dan email telah terkirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $id)
    {
        $rules = [
            'username' => ['required', 'min:3', 'max:255'],
            'password' => 'required|min:5|max:255',
            'role_id' => 'required',
            'status' => 'required',
        ];

        if ($request->email != $id->email) {
            $rules['email'] = 'required|min:1|max:255|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);
        User::where('id', $id->id)
            ->update($validatedData);

        return redirect('/account')->with('update', 'Data telah berhasil diupdate');
    }

    public function changeUserStatus(Request $request)
    {
        $users = User::find($request->id);
        $users->status = $request->status;
        $users->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        User::destroy($id->id);
        return redirect('/account')->with('delete', 'Data telah berhasil dihapus');
    }
}
