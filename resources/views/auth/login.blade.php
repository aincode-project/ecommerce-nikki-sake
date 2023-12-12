@extends('frontend.frontend-layout.admin')

@section('frontend-content')
<!--============================
    BREADCRUMB START
==============================-->
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>login / register</h4>
                    <ul>
                        <li><a href="{{ route('home-user.index', 0) }}">home</a></li>
                        <li><a href="{{ route('login') }}">login / register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    BREADCRUMB END
==============================-->


<!--============================
    LOGIN/REGISTER PAGE START
==============================-->
<section id="wsus__login_register">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 m-auto">
                <div class="wsus__login_reg_area">
                    <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                aria-selected="true">login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                data-bs-target="#pills-profiles" type="button" role="tab"
                                aria-controls="pills-profiles" aria-selected="true">signup</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent2">
                        <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                            aria-labelledby="pills-home-tab2">
                            <div class="wsus__login">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="wsus__login_input">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <div class="col-xl-10">
                                                <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" placeholder="Username *" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wsus__login_input">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <div class="col-xl-10">
                                                <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Enter Password *" />
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wsus__login_save">
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                me</label>
                                        </div>
                                        <a class="forget_p" href="forget_password.html">forget password ?</a> --}}
                                    </div>
                                    <button class="common_btn" type="submit">login</button>
                                    {{-- <p class="social_text">Sign in with social account</p>
                                    <ul class="wsus__login_link">
                                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul> --}}
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                            aria-labelledby="pills-profile-tab2">
                            <div class="wsus__login">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="wsus__login_input">
                                        {{-- <i class="fas fa-user-tie"></i> --}}
                                        <input type="text" class="@error('nama_customer') is-invalid @enderror" id="nama_customer" placeholder="Full Name" name="nama_customer" value="{{ old('nama_customer') }}" required autocomplete="nama_customer" autofocus>
                                        @error('nama_customer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="wsus__login_input">
                                        {{-- <i class="fas fa-user-tie"></i> --}}
                                        <input type="text" class="@error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="wsus__login_input">
                                        {{-- <i class="fas fa-user-tie"></i> --}}
                                        <input type="text" class="@error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="wsus__login_input">
                                        {{-- <i class="fas fa-user-tie"></i> --}}
                                        <input type="text" @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="No Telp" name="no_telp" value="{{ old('name') }}" required autocomplete="no_telp" autofocus>
                                        @error('no_telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="wsus__login_input">
                                        {{-- <i class="far fa-envelope"></i> --}}
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email (example@user.com)">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="wsus__login_input">
                                        {{-- <i class="fas fa-key"></i> --}}
                                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="wsus__login_input">
                                        {{-- <i class="fas fa-key"></i> --}}
                                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    </div>
                                    <div class="wsus__login_save">
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault03">
                                            <label class="form-check-label" for="flexSwitchCheckDefault03">I consent
                                                to the privacy policy</label>
                                        </div> --}}
                                    </div>
                                    <button class="common_btn" type="submit">signup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    LOGIN/REGISTER PAGE END
==============================-->
@endsection

@section('frontend-script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
