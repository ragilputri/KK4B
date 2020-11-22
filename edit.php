<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $kategori=$_POST['kategori'];
    $makanan=$_POST['makanan'];
    $harga=$_POST['harga'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET kategori='$kategori',makanan='$makanan',harga='$harga' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $kategori = $user_data['kategori'];
    $makanan = $user_data['makanan'];
    $harga = $user_data['harga'];
}
?>
<html>
<head>  
    <title>Edit Menu</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Kategori Makanan</td>
                <td><input type="text" name="kategori" value=<?php echo $kategori;?>></td>
            </tr>
            <tr> 
                <td>Nama Makanan</td>
                <td><input type="text" name="makanan" value=<?php echo $makanan;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>