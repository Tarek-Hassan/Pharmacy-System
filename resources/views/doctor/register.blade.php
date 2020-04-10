@include('admin.header')
@section('title','Sign Up')
<body class="hold-transition register-page" style="background-image: url({{asset('control')}}/media/img/bg/bg8.jpg);">
<div class="register-box">
<div class="m-login__logo my-3">
					<a href="#">
						<img width="150px"  class="mx-auto d-block" src="{{asset('control')}}/media/img/logo/logo2.png">
					</a>
				</div> 

  <div class="card">
    <div class="card-body register-card-body">
      @include('admin.error')
      <p class="login-box-msg">Enter your details to create your account:</p>
      <form action="{{-- route('doctor.register') --}}" method="post">
      @csrf  
      <div class="input-group mb-3">
          <input type="text"  class="form-control m-input @error('name') is-invalid @enderror" id="name"
                                type="text" value="{{ old('name') }}" required autofocus placeholder="Fullname"
                                name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="email" type="email"
                                class="form-control m-input @error('email') is-invalid @enderror" placeholder="Email"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input class="form-control m-input @error('password') is-invalid @enderror" id="password"
                                type="password" placeholder="Password" name="password" required
                                autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input class="form-control m-input m-login__form-input--last" id="password-confirm"
                                type="password" placeholder="Confirm Password" name="password_confirmation" required
                                autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">  {{ __('Sign Up') }}</button>
          
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="{{ route('doctor.login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@include('admin.footer')
