<?php
	session_start();
	require_once 'conn.php';
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	if(isset($_GET["user_id"])) {
		$id = $_GET["user_id"];
	} else if($_SESSION["user_id"]) {
		$id = $_SESSION["user_id"];
	}
	
	$res = mysqli_query($conn, "SELECT * FROM `users` INNER JOIN `roles` ON users.id_role=roles.id");
	$row = mysqli_fetch_array($res);
		
	if (is_array($row)) {
		$id = $row["user_id"];
		$first_name = $row["first_name"];
		$last_name = $row["last_name"];
		$email = $row["login"];
		$password = $row["password"];
		$photo = $row["photo"];
		$role_id = $row["id_role"];
	}
?>

<html>
<head>
   <title>User Info</title>
   <link rel="stylesheet" href="assets/css/user.css">
   <style type="text/css">
   	@font-face {
		font-family: "Roboto-Light"; 
		src: url("fonts/Roboto-Light.ttf");
	}	 
	*{
	font-family: "Roboto-Light";
	}

   </style>
</head>
<body>
	<header class="header">User page</header>
	
	<div class= "container">
		<div class="form-container">
			<table>
				<?php
					echo "<tr>";
					if ($photo) {
						echo '<td><br></br><img src='.$photo.' width="250" height="250" alt="Not found" margin = "10px"></td>';
					}
					if(!$photo){
						echo '<td><br></br><img src= "public/images/default.png" width="250" height="250" alt="Not found" margin = "10px"></td>';
					}
					echo "</tr>";
				?>

				<?php
					if ($_SESSION['id_role'] == 1) {
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
						echo "<form action='upload_image.php' method='post' enctype='multipart/form-data'>
						<input type='file' name='fileToUpload' id='fileToUpload'>
						<input type='hidden' value=".$row['user_id']." name='user_id'>
						<input class='btn' type='submit' value='Upload Image' name='submit'>
						</form>";
					echo "</td><tr>";
					

					echo "<form action='update.php' id='update' method='post'>";
					echo "<input type='hidden' value=".$row['user_id']." name='user_id' readonly>";
					echo "<p>Name:</p>";
					echo "<input type='text' value='$first_name' name='first_name' required>";
					echo "<p>Surname:</p>";
					echo "<input type='text' value='$last_name' name='last_name' required>";
					echo "<p>Email:</p>";
					echo "<input type='email' value='$email' name='email' required>";
					echo "<p>Select role: <select class='select' required name='role_id'>";
					echo "<option>Admin</option> <option>User</option>";
					echo "</select></p>";
					echo "<p>Password:</p>";
					echo "<input type='text' value='$password' name='password' minlength='6' required>";
					echo "<button class='btn' type='submit'>Edit</button>";
					echo "</form>";
					echo "<a class= 'btn-delete' href='delete_user.php?user_id=".$row["user_id"]."'>Delete</a>";
					}	
					else{
					
					if($_SESSION['id_role'] == 2){
					echo "<tr>";
					echo "<td>";
					echo "<form action='upload_image.php' method='post' enctype='multipart/form-data'>
						<input type='file' name='fileToUpload' id='fileToUpload'>
						<input class='btn' type='submit' value='Upload Image' name='submit'>
						<input type='hidden' value=".$row['user_id']." name='user_id' readonly>
						</form>";
					echo "</td><tr>";
					echo "<form action='update.php' id='update' method='post'>";
					
					echo "<input type='hidden' value=".$row['user_id']." name='user_id' readonly>";
					echo "<p>Name:</p>";
					echo "<input type='text' value='$first_name' name='first_name' required>";
					echo "<p>Surname:</p>";
					echo "<input type='text' value='$last_name' name='last_name' required>";
					echo "<p>Email:</p>";
					echo "<input type='email' value='$email' name='email' required>";
					echo "<p>Role: User</p>";
					echo "<p>Password:</p>";
					echo "<input type='text' value='$password' name='password' minlength='6' required><br>";
					echo "<button class='btn' type='submit'>Edit</button>";
					echo "</form>";
					}

					else{
					echo "<tr>";
					echo "<td>";
					
					echo "<p>Name:</p>";
					echo "<input type='text' value='$first_name' name='first_name' required>";
					echo "<p>Surname:</p>";
					echo "<input type='text' value='$last_name' name='last_name' required>";
					echo "<p>Email:</p>";
					echo "<input type='email' value='$email' name='email' required>";
					echo "<p>Role: ".$row['title']."</p>";
					echo "</td>";
					echo "</tr>";
					}

					}
					
					echo "<tr>";
					echo "<td>";
					echo "<a href='index.php'><img src = 'public/images/table.png' height='70' width='90' ></a>";
					echo "</td>";
					echo "</tr>";
					?>			
				</form>
			</td></tr></table>
		</div>
	</div>
</body>
</html>