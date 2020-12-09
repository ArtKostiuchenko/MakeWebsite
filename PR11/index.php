<?php
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<html>
<head>
   <meta charset="UTF-8">
   <title>PR11</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
	<?php
		require_once("conn.php");
		
		$res = mysqli_query($conn, "SELECT `id` FROM `users`");
		
		while($id_array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
			<label for= 'fileToUpload'>Select an image for user with id = ".$id_array['id']."<label>
			<input type='hidden' value='".$id_array['id']."' name='id' readonly>
			<input type='file' name='fileToUpload' id='fileToUpload'>
			<input type='submit' value='Upload Image' name='submit'></form><br></br>";
		}
	?>
	</div>
	
	<div>
		<?php
			require_once 'conn.php';
			
			echo "<table cellspacing= '0'cellpadding= '0' border= '1' width='100%' >
			<tr><th>Image</th><th>ID</th><th>First name</th><th>Last name</th><th>Login</th><th>Role</th></tr>";
			
			$res = mysqli_query($conn, "SELECT * FROM `users`");

            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
				
                echo '<tr>';
                    echo '<td align= "center" width= "128"><img src= "'.$row['img'].'" width="128" height="72" alt=""></td>';
					echo '<td align="center">'.$row['id'].'</td>';
                    echo '<td align="center">'.$row['first_name'].'</td>';
                    echo '<td align="center">'.$row['last_name'].'</td>';
                    echo '<td align="center">'.$row['login'].'</td>';
					echo '<td align="center">'.$row['id_role'].'</td>'; 
                echo '</tr>';
            }
			echo "</table>";
		?>
	</div>
</body>
</html>