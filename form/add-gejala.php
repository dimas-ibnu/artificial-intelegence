<?php
// Create database connection using config file
include_once("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-inverse" style="background:#fc6203;">
        <div class="container">
            <div class="navbar-header"> <a class="navbar-brand" href="index.php" style="color:#FFFFFF;">Home</a> </div>
    </nav>
    <div class="container" style="width:900;">

        <br>
        <h2>Tambah Barang</h2>
        <br>

        <form action="add-gejala.php" method="post" name="form1">
            <table width="50%" border="0">
                <tr>
                    <td>ID</td>
                    <td><input type="number" name="id_gejala"></td>
                </tr>
                <tr>
                    <td>Pertanyaan</td>
                    <td><input type="text" name="pertanyaan"></td>
                </tr>
                
                <tr>
                    <td>Jika Ya</td>
                    <td><input type="number" name="ifyes"></td>
                </tr>
                
                <tr>
                    <td>Jika Tidak</td>
                    <td><input type="text" name="ifno"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
        </form>

        <?php

        // Check If form submitted, insert form data into users table.
        if (isset($_POST['Submit'])) {
            $id = $_POST['id_gejala'];
            $pertanyaan = $_POST['pertanyaan'];
            $ifyes = $_POST['ifyes'];
            $ifno = $_POST['ifno'];

            // INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES ([value-1],[value-2],[value-3],[value-4])
            // Insert user data into table
            $query = "INSERT INTO `gejala` (`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES ('$id', '$pertanyaan', '$ifyes', '$ifno')";
            try {

                $conn->exec($query);
                echo $query;

                echo "<script>alert('Sukses menambahkan barang')</script>";
                echo "<script>window.location.href = 'index.php';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Gagal')</script>";
                echo "<script>alert('')</script>";

                echo $query . "<br>" . $e->getMessage();
            }
        }
        ?>

    </div>

</body>

</html>