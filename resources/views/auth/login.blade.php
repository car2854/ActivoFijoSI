@extends('layouts.app')

@section('content')
  <div class="unix-login bg-primary">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<div class="login-content">
							<div class="login-logo">
								<a href="index.html"><span>Activos Fijos</span></a>
							</div>
							<div class="login-form">
								<h4>Bienvenido</h4>
								<form method="POST" action="{{ route('login') }}">
                  @csrf

									<div class="form-group">
										<label>E-Mail Address</label>
										<input type="email" class="form-control" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>


									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="Password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
									</div>



									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
										</label>
										<label class="pull-right">
                      @if (Route::has('password.request'))
											  <a href={{ route('password.request')}}>Forgot Your Password?</a>
                      @endif
										</label>

									</div>
									<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Login</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
