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
<form action="{{ route('usermanagement.update', $usermanagement->id_petugas) }}" method="POST" enctype="multipart/form-data">
@csrf

@method('PUT')
<div class="content-wrapper bg-white">
<div class="row">
 <div class="col-12 grid-margin stretch-card">
   <div class="card">
     <div class="card-body">
       <h4 class="card-title">Form User Management</h4>
       <p class="card-description">
         Isi Form User Management
       </p>
       <form class="forms-sample">
         <div class="form-group">
             <label for="exampleInputName1">Nama Petugas</label>
             <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Petugas" name="nama_petugas" value="{{ $usermanagement->nama_petugas }}">
           </div>
           <div class="form-group">
             <label for="exampleInputName1">Username</label>
             <input type="text" class="form-control" id="exampleInputName1" placeholder="Username" name="username" value="{{ $usermanagement->username }}">
           </div>
           <div class="form-group">
             <label for="exampleInputName1">No Telp</label>
             <input type="text" class="form-control" id="exampleInputName1" placeholder="No Telp" name="telp" value="{{ $usermanagement->telp }}">
           </div>
           <div class="form-group">
             <label for="exampleInputName1">Password</label>
             <input type="text" class="form-control" id="exampleInputName1" placeholder="Password" name="password" value="">
           </div>
           <input type="hidden" name="oldPass" value="{!! $usermanagement->password !!}">
           <div class="form-group">
             <label for="level">Level</label>
             <select name="level" id="level" class="form-control">
               <option value="admin" @if($usermanagement->level == 'admin') selected @endif>Admin</option>
               <option value="petugas" @if($usermanagement->level == 'petugas') selected @endif>Petugas</option>
             </select>
           </div>
         <button type="submit" class="btn btn-primary me-2">Submit</button>
         <a class="btn btn-light" href="{{ route('usermanagement.index') }}">Cancel</a>
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