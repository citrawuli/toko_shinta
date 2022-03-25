@extends('ui-master-auth')

@section('auth-body')
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
	  <div class="content-wrapper d-flex align-items-center auth px-0">
		<div class="row w-100 mx-0">
		  <div class="col-lg-4 mx-auto">
			<div class="auth-form-light text-left py-5 px-4 px-sm-5">
			  <div class="brand-logo">
				<img src="{{asset('skydash/images/logo.svg')}}" alt="logo">
			  </div>
			  <h4>Hello! let's get started</h4>
			  <h6 class="font-weight-light">Sign in to continue.</h6>
			  

			<form method="POST" class="pt-3" action="{{ route('login') }}">
				@csrf
				<div class="form-group">
					<input id="email" type="email" placeholder="Username" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">				
					<input id="password" type="password"placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="mt-3">
				  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
					{{ __('Login') }}
				  </button>
				</div>

				<div class="my-2 d-flex justify-content-between align-items-center">
				  <div class="form-check">
					<label class="form-check-label text-muted">
						<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						{{ __('Remember Me') }}
					</label>
				  </div>
				  
					@if (Route::has('password.request'))
					<a class="auth-link text-black" href="{{ route('password.request') }}">
						{{ __('Forgot Your Password?') }}
					</a>
			  		@endif
				</div>
				<div class="mb-2">
				  	<a href="{{ url('/auth/google') }}"  class="btn btn-block btn-google auth-form-btn"class="btn btn-github"><i class="ti-google mr-2"></i>Connect using Google</a>
				</div>
				<div class="text-center mt-4 font-weight-light">
				  	Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
				</div>
			</form>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- content-wrapper ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
@endsection

