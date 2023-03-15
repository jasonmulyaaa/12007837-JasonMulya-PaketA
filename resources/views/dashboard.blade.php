@extends('layout.master')
@section('content')
<div class="content-wrapper" style="background-color: white;">
<div class="row">
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Total Pengaduan</h4>
<div class="media">
<i class="mdi mdi-format-float-left icon-md text-info d-flex align-self-start me-3"></i>
<div class="media-body">
<h5 class="card-text">{!! $pengaduan !!} Pengaduan</h5>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Total Pengaduan Belum Diverifikasi</h4>
<div class="media">
<i class="mdi mdi-arrow-bottom-right icon-md text-info d-flex align-self-start me-3"></i>
<div class="media-body">
<h5 class="card-text">{!! $pengaduan_belumverifikasi !!} Pengaduan</h5>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Total Pengaduan Proses</h4>
<div class="media">
<i class="mdi mdi-timer-sand icon-md text-info d-flex align-self-start me-3"></i>
<div class="media-body">
<h5 class="card-text">{!! $pengaduan_proses !!}  Pengaduan</h5>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Total Pengaduan Selesai</h4>
<div class="media">
<i class="mdi mdi-checkbox-marked icon-md text-info d-flex align-self-start me-3"></i>
<div class="media-body">
 <h5 class="card-text">{!! $pengaduan_selesai !!}  Pengaduan</h5>
</div>
</div>
</div>
</div>
</div>
@endsection