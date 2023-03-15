@extends('layout.user')
@section('content')
        <!-- start contact-section -->
        <section class="contact-section section-padding" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title-s3">
                            <span>Login</span>
                            <h2>Masuk Akun Anda untuk Melanjutkan.</h2>
                        </div>
                    </div>
                </div>    

                <div class="row contact-form-info">
                    <div class="col col-md-6" style="margin-top: 90px;">
                        <div class="contact-form">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-2">
                              <p>{{ $message }}</p>
                            </div>
                          @endif
                          @if (session()->has('loginError'))
                            <div class="alert alert-danger mt-2">
                              <p>{{ session('loginError') }}</p>
                            </div>
                          @endif
                            <form class="contact-validation-active" action="{{ route('authenticate') }}" method="post">
                                @csrf
                                {{-- <div class="col-lg-12"> --}}
                                    <input type="text" id="name" name="username" class="form-control" placeholder="Username..">
                                    <br>
                                {{-- </div> --}}
                                {{-- <div class="col-lg-12"> --}}
                                    <input type="password" id="email" name="password" class="form-control" placeholder="Password..">
                                {{-- </div> --}}
                                <div class="submit" style="margin-top: 60px;">
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
                    <div class="col col-md-5 col-md-offset-1">
                        <div class="contact-info">
                            <img src="{{ asset('') }}1.png" alt="">
                        </div>
                    </div>
                </div>            
            </div> <!-- end container -->
        </section>
        <!-- end contact-section -->


@endsection