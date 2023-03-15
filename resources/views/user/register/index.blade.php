@extends('layout.user')
@section('content')
        <!-- start contact-section -->
        <section class="contact-section section-padding" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title-s3">
                            <span>Register</span>
                            <h2>Registrasi Akun Anda</h2>
                        </div>
                    </div>
                </div>    

                <div class="row contact-form-info">
                    <div class="col col-md-12" style="margin-top: 90px;">
                        <div class="contact-form">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success mt-2">
                              <p>{{ $message }}</p>
                            </div>
                          @endif
                          @if ($errors->any())
                          <div class="alert alert-danger mt-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach                          
                    </div>
                        @endif
                            <form class="contact-validation-active" action="{{ route('register.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div>
                                    <input type="number" id="name" name="nik" class="form-control" placeholder="NIK.." required>
                                </div>
                                <div>
                                    <input type="text" id="name" name="username" class="form-control" placeholder="Username.." required>
                                </div>
                                {{-- <div> --}}
                                    <input type="text" id="name" name="nama" class="form-control" placeholder="Nama.." required>
                                    <br>
                                {{-- </div> --}}
                                {{-- <div> --}}
                                    <input type="text" id="name" name="telp" class="form-control" placeholder="No Telp.." required>
                                    <br>
                                {{-- </div> --}}
                                {{-- <div> --}}
                                    <input type="password" id="phone" name="password" class="form-control" placeholder="Password.." required>
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
                </div>            
            </div> <!-- end container -->
        </section>
        <!-- end contact-section -->


@endsection