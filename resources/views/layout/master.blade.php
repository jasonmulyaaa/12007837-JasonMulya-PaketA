<!DOCTYPE html>
<html lang="en">
<?php
use App\Models\Konfigurasi;
?>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dashboard </title>
<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('') }}assets/vendors/feather/feather.css">
<link rel="stylesheet" href="{{ asset('') }}assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="{{ asset('') }}assets/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="{{ asset('') }}assets/vendors/typicons/typicons.css">
<link rel="stylesheet" href="{{ asset('') }}assets/vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="{{ asset('') }}assets/vendors/css/vendor.bundle.base.css">
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('') }}assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="{{ asset('') }}assets/js/select.dataTables.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('') }}assets/css/vertical-layout-light/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('') }}assets/images" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
{{-- @php
$konfigurasi = Konfigurasi::first();
@endphp --}}
</head>
<body>
<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
<div class="me-3">
<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
 <span class="icon-menu"></span>
</button>
</div>
<div>
{{-- <a class="navbar-brand brand-logo" href="/">
 <img src="{{ asset('storage/'. $konfigurasi->logo) }}" alt="logo" style="width: 100%; height: 70px; border-radius: 100%;"/>
</a> --}}
{{-- <a class="navbar-brand brand-logo-mini" href="index.html">
 <img src="images/logo-mini.svg" alt="logo" />
</a> --}}
</div>

</div>
<div class="navbar-menu-wrapper d-flex align-items-top"> 
<ul class="navbar-nav">
<li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
 @if (Auth::guard('masyarakat')->check())
 <h1 class="welcome-text"><span class="text-black fw-bold"><span id="time"></span> {{ Auth::guard('masyarakat')->user()->nama }}<span></h1>
 @elseif(Auth::guard('petugas')->check())
 <h1 class="welcome-text"><span class="text-black fw-bold"><span id="time"></span> {{ Auth::guard('petugas')->user()->nama_petugas }}<span></h1>
 @endif
     <script>
         const waktu = new Date().getHours();
         let jam;

         if(waktu < 11){
             jam = "Selamat Pagi,"
         }
         else if(waktu >= 11 && waktu < 15){
             jam = "Selamat Siang,"
         }
         else if(waktu >= 15 && waktu < 19)
         {
             jam = "Selamat Sore,"
         }
         else if(waktu >= 19)
         {
             jam = "Selamat Malam,"
         }

         document.getElementById("time").innerHTML = jam;
     </script>
   <h3 class="welcome-sub-text">Have a nice day! </h3>
</li>
</ul>
<ul class="navbar-nav ms-auto">
<li class="nav-item dropdown ">
 <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
   <img class="img-xs rounded-circle" src="{{ asset('') }}assets/images/faces/icon.png" alt="Profile image" onerror="this.onerror=null; this.src='{{ asset('') }}assets/images/faces/icon.png'" style="width: 40px; height: 40px; object-fit:cover;">
 </a>
 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
   <div class="dropdown-header text-center">
     <img class="img-md rounded-circle" src="{{ asset('') }}assets/images/faces/icon.png" alt="Profile image" onerror="this.onerror=null; this.src='{{ asset('') }}assets/images/faces/icon.png'" style="width: 40px; height: 40px; object-fit:cover;">
 @if (Auth::guard('masyarakat')->check())
 <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::guard('masyarakat')->user()->nama }}</p>
 @elseif (Auth::guard('petugas')->check())
 <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::guard('petugas')->user()->nama_petugas }}</p>
 @endif
   </div>
   <a href="/" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-home text-primary me-2"></i>Halaman Utama</a>
   {{-- <a href="" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account text-primary me-2"></i>Edit Profil</a> --}}
   <form action="{{ route('logout') }}" method="post">
     @csrf
     <button class="dropdown-item"><i class="dropdown-item-icon mdi mdi-import text-primary me-2"></i>Sign Out</button>
   </form>
 </div>
</li>
</ul>
<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
<span class="mdi mdi-menu"></span>
</button>
</div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_settings-panel.html -->


<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar  sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item">
 <a class="nav-link" href="{{ route('dashboard.index') }}">
   <i class="mdi mdi-grid-large menu-icon"></i>
   <span class="menu-title">Dashboard</span>
 </a>
</li>
{{-- <li class="nav-item">
 <a class="nav-link" href="">
   <i class="mdi mdi-grid-large menu-icon"></i>
   <span class="menu-title">Menu Navigasi</span>
 </a>
</li> --}}

{{-- @else --}}
<li class="nav-item nav-category">Homepage</li>
@if (Auth::guard('petugas')->check())

@if (Auth::guard('petugas')->user()->level == 'admin')
<li class="nav-item">
 <a class="nav-link" href="{{ route('verifikasi.index') }}">
   <i class="menu-icon mdi mdi mdi-account-settings"></i>
   <span class="menu-title">Verifikasi</span>
 </a>
</li>
<li class="nav-item">
 <a class="nav-link" href="{{ route('validasi.index') }}">
   <i class="menu-icon mdi mdi mdi-account-settings"></i>
   <span class="menu-title">Validasi & Tanggapan</span>
 </a>
</li>
<li class="nav-item">
 <a class="nav-link" href="{{ route('usermanagement.index') }}">
   <i class="menu-icon mdi mdi mdi-account-settings"></i>
   <span class="menu-title">Petugas Management</span>
 </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('pdf') }}">
    <i class="menu-icon mdi mdi mdi-account-settings"></i>
    <span class="menu-title">Generate Laporan</span>
  </a>
 </li>
 <li class="nav-item">
  <a class="nav-link" href="{{ route('logging.index') }}">
    <i class="menu-icon mdi mdi mdi-account-settings"></i>
    <span class="menu-title">Logging</span>
  </a>
 </li>
@elseif (Auth::guard('petugas')->user()->level == 'petugas')
<li class="nav-item">
 <a class="nav-link" href="{{ route('verifikasi.index') }}">
   <i class="menu-icon mdi mdi mdi-account-settings"></i>
   <span class="menu-title">Verifikasi</span>
 </a>
</li>
<li class="nav-item">
 <a class="nav-link" href="{{ route('validasi.index') }}">
   <i class="menu-icon mdi mdi mdi-account-settings"></i>
   <span class="menu-title">Validasi & Tanggapan</span>
 </a>
</li>
@endif
@endif

@if (Auth::guard('masyarakat')->check())
<li class="nav-item">
 <a class="nav-link" href="{{ route('pengaduan.index') }}">
   <i class="menu-icon mdi mdi mdi-account-settings"></i>
   <span class="menu-title">Pengaduan</span>
 </a>
</li>
@endif


{{-- @endif --}}

{{-- <li class="nav-item nav-category">Contact Us Form</li>
<li class="nav-item">
 <a class="nav-link" href="{{ route('contactus.index') }}">
   <i class="menu-icon mdi mdi mdi-settings"></i>
   <span class="menu-title">Contact Us Form</span>
 </a>
</li>
<li class="nav-item">
 <a class="nav-link" href="{{ route('contactform.index') }}">
   <i class="menu-icon mdi mdi mdi-account-card-details"></i>
   <span class="menu-title">Contact Form CV</span>
 </a>
</li>  --}}
</ul>
</nav>
<!-- partial -->
@yield('content')
</div>

<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('') }}assets/dist/trix.js"></script>
<script src="{{ asset('') }}assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('') }}assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{ asset('') }}assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('') }}assets/vendors/progressbar.js/progressbar.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('') }}assets/js/off-canvas.js"></script>
<script src="{{ asset('') }}assets/js/hoverable-collapse.js"></script>
<script src="{{ asset('') }}assets/js/template.js"></script>
<script src="{{ asset('') }}assets/js/settings.js"></script>
<script src="{{ asset('') }}assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('') }}assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/js/dashboard.js"></script>
<script src="{{ asset('') }}assets/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->


<!-- Page specific script -->
<script>
$(function () {
$("#example1").DataTable({
"responsive": true, "lengthChange": false, "autoWidth": false,
"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>

<script>
document.addEventListener('trix-file-accept', function(e){
e.preventDefault();
})
</script>

<script>
function previewImage() {
const image = document.querySelector('#image');
const imgPreview = document.querySelector('.img-preview');

imgPreview.style.display = 'block';

const oFReader = new FileReader();
oFReader.readAsDataURL(image.files[0]);

oFReader.onload = function (oFREvent) {
 imgPreview.src = oFREvent.target.result;
}
}

</script>

{{-- <script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedTestimonial").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('testimonial.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedPortfolio").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('portfolio.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedBlog").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('blog.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedEducation").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('education.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedWorking").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('working.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedSkill").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('skill.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedService").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('service.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedSosial").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('sosial.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>

<script>
$(function(e){
$("#chkCheckAll").click(function(){
$(".checkBoxClass").prop('checked',$(this).prop('checked'));
});
$("#deleteAllSelectedTutorial").click(function(e){
e.preventDefault();
var allids = [];
$("input:checkbox[name=ids]:checked").each(function(){
allids.push($(this).val());
});
$.ajax({
url:"{{ route('tutorial.deleteSelected') }}",
type:"DELETE",
data:{
_token:$("input[name=_token]").val(),
ids:allids
},
success:function(response){
$.each(allids,function(key,val){
 $("#sid"+val).remove();
})
}
});
})
});
</script>
--}}

@include('sweetalert::alert')
</body>

</html>