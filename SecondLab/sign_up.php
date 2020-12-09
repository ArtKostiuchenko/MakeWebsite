<html>
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="assets/css/sign.css">
   <style>
   		body{
		background-image: url('assets/img/background.jpg');
		font-size: 1em;
		}

		@font-face {
			font-family: "Roboto-Light";
			src: url("fonts/Roboto-Light.ttf");
		}
		*{ font-family: "Roboto-Light"; }

</style>
</head>
<body>
<div class="container">
	<h3>Sign Up</h3>
	<form action="add_user.php" id="sigup" method="post">
						
		<div class="inputgroup">
			<input type="text" name="firstname" id="firstname" placeholder="First name*" required size="60">
		</div>
		<div class="inputgroup">
			<input type="text" placeholder="Last name*" required name="lastname" id="lastname" size="60">
		</div>
									
		<div class="input-group">
			<p>Select role:
				<select class="select" required name="role">
				<option>User</option>
				<option>Admin</option>
				</select></p>
		</div>
		<div class="inputgroup">
			<input type="password" name="password" placeholder="Password*" required id="password" size="60" pattern=".{6,}">
		</div>
		<div class="inputgroup">
			<input type="text" name="login" id="login" placeholder="Login*" required size="60">
		</div>
		<button class="subbut" type="submit">Sign Up</button>
	</form>
	
</div>

</body>
</html>