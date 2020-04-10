@include('admin.header')
@section('title','Login')

<body class="hold-transition login-page" style="background-image: url({{asset('control')}}/media/img/bg/bg8.jpg);">
    <div class="login-box">
    <div class="m-login__logo my-3">
					<a href="#">
						<img width="150px"  class="mx-auto d-block" src="{{asset('control')}}/media/img/logo/logo2.png">
					</a>
				</div> 
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('Reset Password') }}</p>
                @include('admin.error')
                <form action="{{ route('doctor.password.update') }}" method="post">
                @csrf   
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group mb-3">
                        <input type="email" class="form-control" class="form-control m-input @error('email') is-invalid @enderror"    value="{{ $email ?? old('email') }}" required  name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror"  placeholder="Password" name="password"  autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror"  placeholder="password_confirmation" name="password_confirmation"  autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password')}}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- <p class="mb-0">
                    <a href="{{-- route('doctor.register') --}}" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    @include('admin.footer')
