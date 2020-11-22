<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM menu ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<button><a href="add.php">Tambah Menu</a></button>
<button><a href="index.html">Kembali Ke Home</a></button><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>Kategori</th> <th>Makanan</th> <th>Harga</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['kategori']."</td>";
        echo "<td>".$user_data['makanan']."</td>";
        echo "<td>".$user_data['harga']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>