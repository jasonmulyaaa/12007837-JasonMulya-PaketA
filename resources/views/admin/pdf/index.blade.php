@extends('layout.master')
@section('content')

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
<form action="{{ route('generatepdf') }}" method="POST" enctype="multipart/form-data">
@csrf

@method('POST')
<div class="content-wrapper bg-white">
<div class="row">
 <div class="col-12 grid-margin stretch-card">
   <div class="card">
     <div class="card-body">
       <h4 class="card-title">Form Generate Laporan</h4>
       <p class="card-description">
         Isi Form Generate Laporan
       </p>
       <form class="forms-sample">
         <div class="form-group">
             <label for="exampleInputName1">Tanggal Awal</label>
             <input type="date" class="form-control" id="exampleInputName1" placeholder="Tanggal Awal" name="awal">
           </div>
           <div class="form-group">
             <label for="exampleInputName2">Tanggal Akhir</label>
             <input type="date" class="form-control" id="exampleInputName2" placeholder="Tanggal Akhir" name="akhir">
           </div>
         <button type="submit" class="btn btn-primary me-2">Submit</button>
         {{-- <a class="btn btn-light" href="{{ route('pdf.index') }}">Cancel</a> --}}
       </form>
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