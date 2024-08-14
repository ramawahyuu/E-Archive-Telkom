<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/temp/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/temp/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/temp/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/temp/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/temp/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/temp/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/temp/css/main.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login-section">
					<div class="login100-form validate-form">
						<form action="{{ route('login') }}" method="POST">
							@csrf
							<div class="login100-pics">
								<img src="{{ asset('template/temp/images/logo.png')}}" alt="IMG">
							</div>
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<h6>Username</h6>
							<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
								<input class="input100" type="email" value="{{ old('email') }}" name="email" placeholder="Masukkan Username disini">
								<span class="focus-input100"></span>
							</div>
							<h6>Password</h6>
							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<input class="input100" type="password" id="password" name="password" placeholder="Masukkan Password">
								<span class="focus-input100"></span>
								
							</div>
							<div class="container-login100-form-btn">
								<button class="login100-form-btn" type="submit" name="submit">
									Login
								</button>
							</div>
						</form>
					</div>
				</div>
				<div class="content-section" style="display: flex; flex-direction: column; align-items: center;">
					<div class="content" style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
						<img src="{{ asset('template/temp/images/fri.png')}}" alt="University Logo" style="max-width: 30%; margin-right:80px">
						<img src="{{ asset('template/temp/images/ri.png')}}" alt="University Logo" style="max-width: 30%;">
					</div>
					<h2 style="text-align: left; width: 100%; font-weight: 400; font-size:26px;margin-bottom:20px;">Selamat Datang di</h2>
					<div class="black">
						<h2>E-Archive <br> Kemahasiswaan Fakultas Rekayasa Industri</h2>
					</div>
					<h2 style="text-align: left; width: 100%; font-weight: 400; font-size:26px;margin-top:20px;">Telkom University</h2>
					
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('template/temp/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('template/temp/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('template/temp/vendor/select2/select2.min.js')}}"></script>
	<script src="{{ asset('template/temp/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{ asset('template/js/main.js')}}"></script>
</body>
</html>
