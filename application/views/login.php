<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Signin Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="/assets/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/assets/login.css" rel="stylesheet">

</head>

<body>

	<div class="container">

		<form class="form-signin">
			<h2 class="form-signin-heading">Please sign in</h2>
			<div class="alert alert-error hidden"></div>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email address" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>

	</div>
	
	<!-- jQuery core JS -->
	<script src="/assets/jquery-2.1.4/jquery.min.js"></script>

	<script>
		window.onload = function() {

			$("form.form-signin").submit(function (e) {
				e.preventDefault();

				$.ajax({
					type: "POST",
					url: "/login/check/",
					data: $('form.form-signin').serialize(),
					dataType: 'json',
					success: function(msg) {
						if (msg.hasOwnProperty('message'))
						{
							$('.alert-error').empty().removeClass('hidden').append(msg.message);
						}
						if (msg.hasOwnProperty('redirect'))
						{
							window.location.replace(msg.redirect);
						}
					},
					error: function() {
						alert('failure');
					}
				});
			});
		}
	</script>
	
</body>

</html>