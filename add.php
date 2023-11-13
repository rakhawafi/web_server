<!DOCTYPE html>
<html>
<head>
    <title>Add Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: #0074D9;
        }

        a:hover {
            color: #0056b3;
        }

        a.go-home {
            display: block;
            margin: 10px;
        }

        form {
            background-color: #fff;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
        }

        table tr {
            margin: 10px 0;
        }

        td {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #0074D9;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a class="go-home" href="index.php">Go to Home</a>
    <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
        <table>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr> 
                <td>Foto siswa</td>
                <td><input type="file" name="foto" accept="image/*"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>

    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gambar = $_FILES['foto']['name'];
        $gambartmp = $_FILES['foto']['tmp_name'];

        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `email`, `mobile`, `image`) VALUES ( '$name',  '$email', '$mobile', '$gambar');");
        move_uploaded_file($gambartmp, "uploads/$gambar");
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>