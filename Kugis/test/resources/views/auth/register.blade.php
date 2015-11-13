<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Norel IT test">
<meta name="author" content="Andris Briedis, 4andrisbriedis@gmail.com">

<title>Detaļas - Reģistrācija</title>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<!-- Custom Fonts -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="bg_box">
		<img src="{{ asset('img/bg_index.jpg') }}" class="bg_img">
	</div>


	<div class="login_box">

		<div class="login_cont">
		
			<form method="POST" action="/auth/register">
				{!! csrf_field() !!}

				<h3>Jauna lietotāja reģistrācija</h3>
			
				<div class="form-group">
					<input type="text" name="last_name" 
						value="{{ old('last_name') }}" 
						class="form-control bg-tr-white" 
						placeholder="Uzvārds" 
						autocomplete="off" 
						required autofocus>
				</div>

				<div class="form-group">
					<input type="text" name="first_name" 
						value="{{ old('first_name') }}" 
						class="form-control bg-tr-white" 
						placeholder="Vārds" 
						autocomplete="off" 
						required>
				</div>				
				<br>
				<div class="form-group">
					<input type="email" name="email" 
						value="{{ old('email') }}" 
						class="form-control bg-tr-white" 
						placeholder="e-pasts" 
						autocomplete="off">
				</div>
				<br>
				<div class="form-group">
					<input type="password" name="password" 
						class="form-control bg-tr-white" 
						placeholder="Parole (minimums 7 simboli)" 
						autocomplete="off" 
						required>
				</div>
			
				<div class="form-group">
					<input type="password" name="password_confirmation" 
						class="form-control bg-tr-white" 
						placeholder="parole atkārtoti" 
						autocomplete="off" 
						required>
				</div>
			
				<div>
					<button class="btn btn-primary btn-lg btn-block" type="submit">Reģistrēties</button>
				</div>
			</form>

		</div>

	</div>


	<!-- jQuery -->
	<script src="{{ asset('js/jquery.js') }}"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
