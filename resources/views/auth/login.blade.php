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
            <!-- <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div> -->
                <p class="login-box-msg">  Sign in to start your session</p>
                @include('admin.error')
                @include('admin.tab')
                <form action="{{ route('login') }}" method="post">
                @csrf   
                <div class="input-group mb-3">
                        <input type="email" class="form-control" class="form-control m-input @error('email') is-invalid @enderror"    value="{{ old('email') }}" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control m-input m-login__form-input--last @error('password') is-invalid @enderror"  placeholder="Password" name="password"  autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <label class="m-checkbox  m-checkbox--light">
									<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									Remember me
									<span></span>
								</label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                @if (Route::has('password.request'))
								<a href="{{ route('password.request') }}"  class="m-link">
									Forget Password ?
								</a>
								@endif
                </p>
                <p class="mb-0">

                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    @include('admin.footer')
