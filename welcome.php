<?php
include "DbConnection.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}
// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}

echo "Welcome ".$_SESSION['uname'];



?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h2>You have successfully logged in</h2>

        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
        <?php

		$result = mysqli_query($con,"SELECT * FROM users");

		echo "<table border='1'>
		<tr>
		<th>ID</th>
		<th>Username</th>
		<th>name</th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";

		mysqli_close($con);

		?>
    </body>
</html>