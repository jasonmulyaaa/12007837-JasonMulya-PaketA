@extends('layout.master')
@section('content')
<?php
use App\Models\Tanggapan;
use App\Models\Petugas;
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
       <h4 class="card-title">Form verifikasi</h4>
       <p class="card-description">
         Isi Form verifikasi
       </p>
       <div class="row">
         <div class="col-md-4">
           <address>
             <h4 class="fw-bold">Foto</h4>
             <br>
             <!-- Button trigger modal -->
             <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: none;">
              <img src="{{ asset('storage/' . $verifikasi->foto) }}" alt="course" onerror="this.onerror=null; this.src='../../assets/images/faces/icon.png'" style="width: 240px; height: 240px; object-fit: cover;">
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="{{ asset('storage/' . $verifikasi->foto) }}" alt="course" onerror="this.onerror=null; this.src='../../assets/images/faces/icon.png'" style="width: 100%; height: 100%;">
                  </div>
                </div>
              </div>
            </div>              
            <br>
             <br>
             <h5>
               <b>
               {!! $nama->nama !!} ({!! $verifikasi->nik !!})
               </b>
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
             <h5 class="fw-bold">
              Ditanggapi Oleh:
            </h5>
            @if ($tanggapan)
            @php
                $petugas = Petugas::where('id_petugas', $tanggapan->id_petugas)->first();
            @endphp
            <p class="mb-2">
              {!! $petugas->nama_petugas !!}
            </p>
            @else
            <p class="mb-2">
              (Belum ada yang menanggapi)
            </p>
            @endif

           </address>
         </div>
       </div>
     </div>
       <div class="card-body">
         <h4 class="card-title">Tanggapan</h4>
         <form action="{{ route('verifikasi.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('POST')

                   <div class="card-body">
                     <form class="forms-sample">
                       <div class="form-group">
                         <label for="content1">Tanggapan</label>
                         <textarea id="content1" name="tanggapan" rows="5" style="width: 100%;">{{ old('tanggapan') }}</textarea>
                       </div>
                       <input type="hidden" name="id_pengaduan" value="{{ $verifikasi->id_pengaduan }}">
                       <button type="submit" class="btn btn-primary me-2">Submit</button>
                       <a class="btn btn-light" href="{{ route('verifikasi.index') }}">Cancel</a>
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