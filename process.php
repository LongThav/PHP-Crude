<?php
include_once 'database.php';
if (isset($_POST['save'])) {
    $LastName = $_POST['LastName'];
    $FirstName = $_POST['FirstName'];
    $Address = $_POST['Address'];
    $city = $_POST['city'];

    $output_dir = "upload/";/* Path for file upload */
    $RandomNum   = time();
    $ImageName      = str_replace(' ', '-', strtolower($_FILES['image']['name'][0]));
    $ImageType      = $_FILES['image']['type'][0];

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.', '', $ImageExt);
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
    $ret[$NewImageName] = $output_dir . $NewImageName;
    if (!file_exists($output_dir)) {
        @mkdir($output_dir, 0777);
    }

    move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );

    $sql = "INSERT INTO person (LastName, FirstName, Address, city, image)
    VALUES ('$LastName', '$FirstName', '$Address', '$city', '$NewImageName')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
