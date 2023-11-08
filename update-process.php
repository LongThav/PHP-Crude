<?php
include_once 'database.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE person set id='" . $_POST['id'] . "', LastName='" . $_POST['LastName'] . "', FirstName='" . $_POST['FirstName'] . "', Address='" . $_POST['Address'] . "' ,city='" . $_POST['city'] . "' WHERE id='" . $_POST['id'] . "'");
    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT * FROM person WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
<html>

<head>
    <title>Update Employee Data</title>
</head>

<body>
    <form name="frmUser" method="post" action="">
        <div><?php if (isset($message)) {
                    echo $message;
                } ?>
        </div>
        <div style="padding-bottom:5px;">
            <a href="retrieve.php">Employee List</a>
        </div>
        Id: <br>
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="text" name="id" value="<?php echo $row['id']; ?>">
        <br>
        First Name: <br>
        <input type="text" name="FirstName" class="txtField" value="<?php echo $row['FirstName']; ?>">
        <br>
        Last Name :<br>
        <input type="text" name="LastName" class="txtField" value="<?php echo $row['LastName']; ?>">
        <br>
        City:<br>
        <input type="text" name="Address" class="txtField" value="<?php echo $row['Address']; ?>">
        <br>
        Email:<br>
        <input type="text" name="city" class="txtField" value="<?php echo $row['city']; ?>">
        <br>
        <input type="submit" name="submit" value="Submit" class="buttom">

    </form>
</body>

</html>