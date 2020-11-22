<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM menu ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Menu/title</title>
	<link rel="stylesheet" href="style/main.css">
</head>

<body>
<header>
		<div class="container">
			<h1><a href="index.html">Resto Queen</a></h1>
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="about.html">ABOUT</a></li>
                <li><a href="menu.html">MENU</a></li>
                <li class="active"><a href="ListMenu.php">LIST MENU</a></li>
                <li><a href="loginmenu.php">REMOVE MENU</a></li>
				<li><a href="contact.html">CONTACT</a></li>
			</ul>
	</div>
    </header>
    <div class="filter">
    <table width='60%' border=1>

    <tr>
        <th>Kategori</th> <th>Makanan</th> <th>Harga</th> 
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['kategori']."</td>";
        echo "<td>".$user_data['makanan']."</td>";
        echo "<td>".$user_data['harga']."</td>";          
    }
    ?>
    </table>
    </div>
</body>
</html>