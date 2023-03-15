@extends('layout.master')
@section('content')
<?php
use App\Models\Tanggapan;
?>
{{-- @if ($errors->any())
<div class="alert alert-danger">
 <strong>Whoops!</strong> There were some problems with your input.<br><br>
 <ul>
     @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
     @endforeach
 </ul>
</div>
@endif --}}

<div class="content-wrapper bg-white">
<div class="row">
 <div class="col-12 grid-margin stretch-card">
   <div class="card">
     <div class="card-body">
       <h4 class="card-title">Detail Pengaduan</h4>
       {{-- <p class="card-description">
         Isi Form Pengaduan
       </p> --}}
       <div class="row">
         <div class="col-md-4">
           <address>
             <h4 class="fw-bold">Foto</h4>
             <br>
             <img src="{{ asset('storage/' . $verifikasi->foto) }}" alt="course" onerror="this.onerror=null; this.src='../../assets/images/faces/icon.png'" style="width: 240px; height: 240px; object-fit: cover;">
             <br>
             <br>
             <h5>
                <b>Nama Pengadu: </b> {!! $nama->nama !!}
              </h5>
              <h5>
                 <b>NIK: </b> {!! $verifikasi->nik !!}
             </h5>
             <br>
             <h5>
               <b>
               Tanggal: {!! $verifikasi->tgl_pengaduan !!}
               </b>
             </h5>
           </address>
         </div>
         <div class="col-md-8">
           <address>
             <br>
             <h5 class="fw-bold">
               Isi Laporan
             </h5>
             <p class="mb-2">
               {!! $verifikasi->isi_laporan !!}
             </p>
             <br>
           @php
             $tanggapan = Tanggapan::where('id_pengaduan', $verifikasi->id_pengaduan)->first();
         @endphp
             <h5 class="fw-bold">
               Isi Tanggapan
             </h5>
             @if ($tanggapan)
             <p class="mb-2">
               {!! $tanggapan->tanggapan !!}
             </p>
             @else
             <p class="mb-2">
               (Tanggapan Belum Ditanggapi oleh Petugas)
             </p>
             @endif

           </address>
         </div>
         <a class="btn btn-secondary me-2" href="{{ route('verifikasi.index') }}">Back</a>
       </div>
     </div>
     </div>
   </div>
 </div>
</form>

 <!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
<div class="d-sm-flex justify-content-center justify-content-sm-between">
 <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Halaman ini bersifat rahasia dan hanya boleh diakses oleh pihak yang berwajib</span>
 <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. Laporan Pengaduan Masyarakat</span>
</div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

@endsection