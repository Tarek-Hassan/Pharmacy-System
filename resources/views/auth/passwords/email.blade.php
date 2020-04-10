@include('admin.header')
@section('title','Forgot Password')

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
    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      @include('admin.error')
      <form action="{{ route('password.email') }}" method="post">
      @csrf  
      <div class="input-group mb-3">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Login</a>
      </p>
      <!-- <p class="mb-0">
        <a href="{{-- route('register') --}}" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

    @include('admin.footer')
