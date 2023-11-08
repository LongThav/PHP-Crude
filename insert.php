<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data</title>
</head>
<body>
    <form method="post" action="process.php" enctype="multipart/form-data">
        First name:<br>
        <input type="text" name="FirstName">
        <br>
        Last name:<br>
        <input type="text" name="LastName">
        <br>
        Address:<br>
        <input type="text" name="Address">
        <br>
        City:<br>
        <input type="text" name="city">
        <br>
        Image:<br>
        <input type="file" name="image[]" />
        <br><br>
        <input type="submit" name="save" value="save">
    </form>
</body>
</html>