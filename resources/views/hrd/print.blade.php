<!DOCTYPE html>
<html lang="en">
@php
    use Carbon\Carbon;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Hasil</title>
</head>

<body>
    @php $no = 1; @endphp

    <div class="form-group">
        <center><img src="logo.png" alt="logo monster" class="mx-auto"></center>
        <h3 align="center"><b>Laporan Pengerjaan
                Psikotes</b></h3>
        <p style="margin-left:40px; margin-top:40px;"> <b>PT Monster Teknologi Kencana</b> </p>
        <p style="margin-left:40px;"> <b>Periode : {{ $tanggal_awal }} - {{ $tanggal_akhir }}</b> </p>
        <p style="margin-left:40px;">Laporan hasil pengerjaan psikotes yang telah dilaksanakan. Dalam surat ini,
            menjelaskan secara detail mengenai proses pelaksanaan tes psikologi, temuan yang ditemukan, dan
            kesimpulan yang dapat diambil dari hasil tersebut.</p>
        <br><br>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Nama</th>
                    <th colspan="2" class="text-center">Hasil</th>
                    <th rowspan="2" class="text-center">Keterangan</th>
                </tr>
                <tr>
                    <th class="text-center">Posisi pilihan</th>
                    <th class="text-center">Jumlah Poin</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($hasil as $hasil)
                    <tr>

                        <td>
                            <center>{{ $no++ }}</center>
                        </td>

                        <td>{{ $hasil->user->nama_lengkap }}</td>
                        <td>
                            <center>{{ $hasil->user->posisi_pilihan }}</center>
                        </td>
                        <td>
                            <center>{{ $hasil->jumlah_poin }}</center>
                        </td>
                        <td>
                            @if (($hasil->jumlah_poin > 156) | ($hasil->jumlah_poin == 156))
                                <span class="badge rounded-pill bg-label-success">
                                    Lolos Ambang Batas
                                </span>
                            @endif

                            @if ($hasil->jumlah_poin < 156)
                                <span class="badge rounded-pill bg-label-danger">
                                    Tidak lolos Ambang Batas
                                </span>
                            @endif
                        </td>
                    </tr>

            </tbody>
            @endforeach
        </table>
    </div>
    <br><br>
    <p style="margin-left:40px;">Terima kasih atas perhatian dan waktu yang telah diberikan. Kami berharap hasil laporan
        ini dapat memberikan kontribusi positif dalam pengambilan keputusan dan pengembangan sumber daya manusia di
        perusahaan ini kedepannya.</p>

    <p style="text-align: right; margin-top:70px; margin-right: 52px;"><b>Surakarta,
            {{ Carbon::now()->format('d-m-Y') }}</b></p>
    <p style="text-align: right; margin-right: 40px;"><b>HRD Monster Group Solo</b></p>
    <p style="text-align: right; margin-right: 75px; margin-top:100px;"><b>Burhan Riyadi</b></p>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
