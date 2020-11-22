<html>
<head>
    <title>Tambah Menu</title>
</head>

<body>
    <button><a href="index.php">Kembali ke Home</a></button>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Kategori Makanan :</td>
                <td><input type="text" name="kategori"></td>
            </tr>
            <tr> 
                <td>Nama Makanan :</td>
                <td><input type="text" name="makanan"></td>
            </tr>
            <tr> 
                <td>Harga Makanan :</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah Menu"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $kategori = $_POST['kategori'];
        $makanan = $_POST['makanan'];
        $harga = $_POST['harga'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu (kategori, makanan, harga) VALUES('$kategori','$makanan','$harga')");

        // Show message when user added
        echo "Berhasil Ditambahkan. <a href='index.php'>Lihat Daftar</a>";
    }
    ?>
</body>
</html>