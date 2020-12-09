<?php
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<html>
<head>
<title>Main</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
 
<style type="text/css">

@font-face {
font-family: "Roboto-Light"; 
src: url("fonts/Roboto-Light.ttf");
} 

*{
	font-family: "Roboto-Light";
}
body{
	background-image: url('assets/img/background.jpg');
}

table {
font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
font-size: 20px;
border-radius: 10px;
width:100%;
padding: 10px;
border-spacing: 0;
text-align: center;
}
th {
background: #BCEBDD;
color: white;
text-shadow: 0 1px 1px #2D2020;
padding: 10px 20px;
}
th, td {
border-style: solid;
border-width: 0 1px 1px 0;
border-color: white;
}
th:first-child, td:first-child {
text-align: left;
}
th:first-child {
border-top-left-radius: 10px;
}
th:last-child {
border-top-right-radius: 10px;
border-right: none;
}
td {
padding: 10px 20px;
background: #F8E391;
}
tr:last-child td:first-child {
border-radius: 0 0 0 10px;
}
tr:last-child td:last-child {
border-radius: 0 0 10px 0;
}
tr td:last-child {
border-right: none;
}
</style>
</head>
<body>
<div class="header">
	<?php
		if($_SESSION['first_name']) {
			$first_name = $_SESSION['first_name'];
			echo "<a class='btnn' href='user_page.php'>$first_name</a>
			<a class='btnn' href='sign_out.php'>Sign Out</a>";
		} else {
			echo "<a class='btnn' href='sign_up.php'>Sign Up</a>
			<a class='btnn' onclick='openForm()'>Sign In</a>";
		}
	?>
	<div class="user-form" id="userForm">
		<form action="sign_in.php" class="form-container" method="post">
			<h1>SIGN IN</h1>
			<?php if ($_SESSION["message"]) {
				echo"<p>" .$_SESSION["message"]. "</p>";
				unset($_SESSION["message"]);
			}?>
			<label for="email"><b>Email</b></label>
			<input type="email" placeholder="Your email" name="email" required>
			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Your password" name="password" minlength="6" required>
			<button type="submit" class="btn">Sign In</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		</form>
	</div>
</div>
	<div>
		<?php
			require_once 'conn.php';
			echo "<table cellspacing='0'>
			<tr><th>#</th><th>First name</th><th>Last name</th><th>Email</th><th>Role</th></tr>";
			
			$res = mysqli_query($conn, "SELECT * FROM `users` INNER JOIN `roles` ON users.id_role=roles.id");

            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
				
                echo '<tr>';
					echo '<td align="center">'.'<a href="user_page.php?id='.$row['id'].'">'.$row['id'].'</td>';
                    echo '<td align="center">'.$row['first_name'].'</td>';
                    echo '<td align="center">'.$row['last_name'].'</td>';
                    echo '<td align="center">'.$row['login'].'</td>';
                    echo '<td align="center">'.$row['title'].'</td>';
                echo '</tr>';
            }
			echo "</table>";
			if ($_SESSION["id_role"] == 1) {
				echo '<p><a class= "btnn" href= "sign_up.php">Add User</a></p>';
			}
		?>
	</div>
</div>
	<script src="assets/js/sign_in.js"></script>
</body>
</html>