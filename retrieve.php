<?php
include_once 'database.php';
$result = mysqli_query($conn, "SELECT * FROM person");
?>
<!DOCTYPE html>
<html>

<head>
    <title> Retrive data</title>
</head>
<style>
    body {
        margin-right: 30px;
        margin-left: 30px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;

    }
    .btn1{
        margin: 15px;
        padding: 15px;
        background-color: green;
        list-style-type: none;
        text-decoration: none;
        font-size: 18px;
        border-radius: 15px;
        color: white;
    }    

    .btn2{
        margin: 15px;
        padding: 15px;
        background-color: red;
        list-style-type: none;
        text-decoration: none;
        font-size: 18px;
        border-radius: 15px;
        color: white;
    }

    tr:nth-child(even) {
        background-color: white;
    }
</style>

<body>
    <p style="text-align: center; color: black; font-size: 30px;">Profile</p>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Address</td>
                <td>City</td>
                <td>Profile</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["FirstName"] ?></td>
                    <td><?php echo $row["LastName"] ?></td>
                    <td><?php echo $row["Address"]; ?></td>
                    <td><?php echo $row["city"]; ?></td>
                    <?php
                    echo "<td>";
                    // echo  '<img src="data:image/jpeg;base64,'.base64_encode($row["image"]). '" height="200" width="200"/>';
                    echo '<img src=" http://localhost:8080/php_advanced/backend/upload/' . $row["image"] . '" height="80" width="80" style="border-radius:15px;"/>';
                    echo "<br>";
                    echo "</td>";
                    ?>
                    <td><a class="btn1" href="update-process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
                    <td><a class="btn2" href="delete-process.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </table>
    <?php
    } else {
    ?>
        <p style="text-align: center;">No item</p>
    <?php
    }
    ?>
</body>

</html>