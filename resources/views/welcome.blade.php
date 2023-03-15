@extends('layout.user')
@section('content')
        <!-- start hero-section -->
        <section class="hero-section-s3">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-sm-8">
                        <div class="content">
                            <h2>Laporan Pengaduan Masyrakyat Desa</h2>
                            <p>Pengelolaan pengaduan pelayanan masyarakat di desa yang terorganinisir dengan baik yang membuat masyarakat desa merasa puas dengan layanan kami.</p>
                            {{-- <div class="btns">
                                <a href="#"><img src="{{ asset('') }}assets/user/images/app-store.jpg" alt></a>
                                <a href="#"><img src="{{ asset('') }}assets/user/images/play-store.jpg" alt></a>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="phone">
                    <img src="{{ asset('2.png') }}" alt>
                </div>
            </div>
        </section>
        <!-- end hero-section -->


        <!-- start contact-section-s2 -->
        <section class="contact-section-s2 section-padding" id="contact">
            <div class="container">

                @if (Auth::guard('masyarakat')->check())
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title-s3">
                            <span>Form Pengaduan</span>
                            <h2>Berikan Laporan dan Aspirasi anda.</h2>
                        </div>
                    </div>
                </div>  
                <div class="row contact-form-info">
                    <div class="col col-md-12">
                        <div class="contact-form">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-2">
                              <p>{{ $message }}</p>
                            </div>
                          @endif
                            <form class="contact-validation-active" action="{{ route('welcome.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <input type="file" name="foto" class="form-control" placeholder="Foto..">
                                    <br>
                                    <textarea class="form-control" id="message" name="isi_laporan" placeholder="Laporan.."></textarea>
                                    <input type="hidden" name="status" value="0">
                                <div class="submit" style="margin-top: 30px;">
                                    <button type="submit">Submit</button>
                                    <div id="loader">
                                        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                    </div>
                                </div>
                                <div class="error-handling-messages">
                                    <div id="success">Thank you</div>
                                    <div id="error"> Error occurred while sending email. Please try again later. </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>     
                @else
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title-s3">
                            <span>Form Pengaduan</span>
                            <h2>Anda Perlu Login Terlebih Dahulu.</h2>
                        </div>
                    </div>
                </div> 
                <div class="section-title-s3">
                    <a href="{{ route('login') }}" class="theme-btn-s3">Login</a>
                </div>
                @endif

            </div> <!-- end container -->
        </section>
        <!-- end contact-section-s2 -->
@endsection