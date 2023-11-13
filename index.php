<?php
// Create database connection using config file
include_once("config.php");

// Check for a database connection error
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all users data from the "data_siswa" table
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

// Check for errors in the query
if (!$result) {
    die("Query failed: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #0074D9;
        }

        a:hover {
            color: #0056b3;
        }

        a.edit, a.delete {
            display: inline-block;
            margin: 5px;
        }

        a.edit:hover, a.delete:hover {
            color: #fff;
            background-color: #0074D9;
            padding: 5px 10px;
            border-radius: 5px;
        }

        a.delete:hover {
            background-color: #ff4136;
        }

        a.add {
            display: block;
            background-color: #0074D9;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            margin: 20px auto;
            width: 120px;
        }

        a.add:hover {
            background-color: #0056b3;
        }
    </style>

<body>
<a href="add.php">Add New User</a><br/><br/>
<a class="add" href="add.php">Add New User</a>

<table width='80%' border=1>
    <tr>
        <th>Name</th> <th>Mobile</th> <th>Email</th> <th>Gambar</th> <th>Update</th> 
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['name']."</td>";
        echo "<td>".$user_data['mobile']."</td>";
        echo "<td>".$user_data['email']."</td>";
        echo "<td><img src='uploads/".$user_data['image']."' style='max-width: 20rem;'></td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
</table>

</body>
</html>
