<?php
include_once 'script/config.php';
if (isset($_POST["submit"])) {
    $nameornumber = $_POST['nameornumber'];
    $numberofbeds = $_POST['numberofbeds'];
    $type = $_POST['type'];
    $bedsize = $_POST['bedsize'];
    $cost = $_POST['cost'];
    $isavailable = $_POST['isavailable'];
    $imagedir = 'roomimages/' . $_FILES['image']['name'];

// echo $imagedir;
    // echo $link;

// $sql = "INSERT IGNORE INTO `room`(`id`, `nameornumber`, `numberofbeds`, `type`, `bedsize`, `cost`, `isavailable`, `imagedir`)
    //     VALUES (NULL,'Roca3',1,'Double','King',500,1,'roomimages/cocoabeans.jpg')";
    $sql = "INSERT IGNORE INTO `room`(`id`, `nameornumber`, `numberofbeds`, `type`, `bedsize`, `cost`, `isavailable`, `imagedir`)
        VALUES (NULL,'$nameornumber',$numberofbeds,'$type','$bedsize',$cost,$isavailable,'$imagedir')";

    if (mysqli_query($link, $sql)) {
        echo "Records inserted successfully.";
        move_uploaded_file($_FILES["image"]["tmp_name"], "$imagedir");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label>name</label>
        <input type="text" name="nameornumber">
        <label>numberofbeds</label>
        <input type="text" name="numberofbeds">
        <label>type</label>
        <input type="text" name="type">
        <label>bedsize</label>
        <input type="text" name="bedsize">
        <label>cost</label>
        <input type="text" name="cost">
        <label>isavailable</label>
        <input type="text" name="isavailable">
        Select Image File to Upload:
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
