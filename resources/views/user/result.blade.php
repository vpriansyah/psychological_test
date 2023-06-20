@Extends('layouts.user')
@section('user')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Task /</span> Exam</h4>
        <div class="card text-center" style="padding: 50px 20px">

            <h2 class="card-header text-success">
                <span class="tf-icons bx bx-check-circle bx-lg mb-2"></span><br>Congratulation !
            </h2>
            <div class="card-body">
                <h5 class="card-title">Jawaban telah terkirim </h5>
                <p class="card-text">Terima kasih banyak telah berpartisipasi dalam pengerjaan psikotes ini.</p>
                <p class="card-text text-secondary"> ( Untuk selanjutnya, silahkan menunggu informasi e-mail
                    selanjutnya )</p>

            </div>
        </div>

    </div>
@endsection
