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
       <h4 class="card-title">Detail Validasi</h4>
       {{-- <p class="card-description">
         Isi Form validasi
       </p> --}}
       <div class="row">
         <div class="col-md-4">
           <address>
             <h4 class="fw-bold">Foto</h4>
             <br>
             <img src="{{ asset('storage/' . $validasi->foto) }}" alt="course" onerror="this.onerror=null; this.src='../../assets/images/faces/icon.png'" style="width: 240px; height: 240px; object-fit: cover;">
             <br>
             <br>
             <h5>
               <b>
               {!! $nama->nama !!} ({!! $validasi->nik !!})
               </b>
             </h5>
             <br>
             <h5>
               <b>
               Tanggal: {!! $validasi->tgl_pengaduan !!}
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
               {!! $validasi->isi_laporan !!}
             </p>
             @php
             $tanggapan = Tanggapan::where('id_pengaduan', $validasi->id_pengaduan)->first();
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
       </div>
     </div>
       <div class="card-body">
         <h4 class="card-title">Tanggapan</h4>
         <form action="{{ route('validasi.update', $validasi->id_pengaduan) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')

                   <div class="card-body">
                     <form class="forms-sample">
                       <div class="form-group">
                         <label for="content1">Tanggapan</label>
                         <textarea id="content1" name="tanggapan" rows="5" style="width: 100%;">{!! $tanggapan->tanggapan !!}</textarea>
                       </div>
                       <input type="hidden" name="id_pengaduan" value="{{ $validasi->id_pengaduan }}">
                       <button type="submit" class="btn btn-primary me-2">Submit</button>
                       <a class="btn btn-light" href="{{ route('validasi.index') }}">Cancel</a>
                     </form>
                   </div>
                 {{-- </div>
               </div> --}}
   </form>
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
 <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. Sweet Things</span>
</div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

@endsection