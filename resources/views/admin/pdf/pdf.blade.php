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
    <h1 style="text-align: center;">Laporan Pengaduan</h1>
    <p>Generated: {!! date('Y-m-d') !!}</p>
    <table style="background-color: black; width:100%;">
        <thead>
            <tr style="background-color: lightgrey;">
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
                 Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($generatepdfs as $generatepdf)
                
            <tr style="background-color: white;">
                <td>
                    {!! $generatepdf->nik !!}
                </td>
                <td>
                    {{ $generatepdf->tgl_pengaduan}}
                </td>
                <td style="text-align: center;">
                    {!! $generatepdf->isi_laporan !!}
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