<?php
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use App\Models\Petugas;
use App\Models\Pengaduan;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File PDF</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
</head>
<body>
    {{-- <img src="assets/pengaduan.png" alt=""> --}}
    <h1 style="text-align: center;">Laporan Pengaduan Desa Tegallega</h1>
    <p>Generated: {!! date('Y-m-d') !!}</p>
    {{-- @foreach ($petugas as $petugas)
    @php
        $rekap = Pengaduan::where('rt', $petugas->rt)->where('rw', $petugas->rw)->where('status', 'proses')->orwhere('status', 'selesai')->count();
    @endphp
    RT/RW: {!! $petugas->rt !!}/{!! $petugas->rw !!} = {!! $rekap !!}<br>
    @endforeach --}}

    <table style="background-color: black; width:100%;">
        <thead>
            <tr style="background-color: lightgrey;">
                <th>
                RT
                </th>
                <th>
                RW
                </th>
                <th>
                Menunggu
                </th>
                <th>
                Proses
                </th>
                <th>
                Selesai
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($petugas as $petugas)
            <tr style="background-color: white;">
            @php
            // $tanggapan = Tanggapan::where('id_pengaduan', $generatepdf->id_pengaduan)->first();
            // $petugas = Petugas::where('id_petugas', $generatepdf->id_petugas)->first();
            // $nama = Masyarakat::where('nik', $generatepdf->nik)->first();
            @endphp
                <td style="padding: 0px 10px;">
                    {{ $petugas->rt }}
                </td>
                <td style="padding: 0px 10px;">
                    {!! $petugas->rw !!}
                </td>
                <td>
                    @php
                        $menunggu = Pengaduan::where('rt', $petugas->rt)->where('rw', $petugas->rw)->where('status', '0')->count();
                    @endphp
                    {{ $menunggu }}
                </td>
                <td style="text-align: center; padding: 10px 0px;">
                    @php
                        $proses = Pengaduan::where('rt', $petugas->rt)->where('rw', $petugas->rw)->where('status', 'proses')->count();
                    @endphp
                    {{ $proses }}                
                </td>
                <td style="text-align: center; padding: 10px 0px;">
                    @php
                    $selesai = Pengaduan::where('rt', $petugas->rt)->where('rw', $petugas->rw)->where('status', 'selesai')->count();
                @endphp
                {{ $selesai }} 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <table style="background-color: black; width:100%;">
        <thead>
            <tr style="background-color: lightgrey;">
                <th>
                Nama
                </th>
                <th>
                NIK
                </th>
                <th>
                Tanggal Pengaduan
                </th>
                <th>
                Isi Laporan
                </th>
                <th>
                Tanggapan
                </th>
                <th>
                Petugas
                </th>
                <th>
                 Status
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($generatepdfs as $generatepdf)
            <tr style="background-color: white;">
            @php
            $tanggapan = Tanggapan::where('id_pengaduan', $generatepdf->id_pengaduan)->first();
            $petugas = Petugas::where('id_petugas', $generatepdf->id_petugas)->first();
            $nama = Masyarakat::where('nik', $generatepdf->nik)->first();
            @endphp
                <td style="padding: 0px 10px;">
                    {{ $nama->nama }}
                </td>
                <td style="padding: 0px 10px;">
                    {!! $generatepdf->nik !!}
                </td>
                <td>
                    {{ $generatepdf->tgl_pengaduan}}
                </td>
                <td style="text-align: center; padding: 10px 0px;">
                    {!! $generatepdf->isi_laporan !!}
                </td>
                <td style="text-align: center; padding: 10px 0px;">
                    @if ($tanggapan)
                    {!! $tanggapan->tanggapan !!}
                    @else
                    Belum Ditanggapi
                    @endif
                </td>
                <td>
                    @if ($petugas)
                    {!! $petugas->nama_petugas !!}
                    @else
                    Belum Ditanggapi
                    @endif
                </td>
                <td>
                    {!! $generatepdf->status !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>