<?php
    include_once 'connect.php';
    
    
        $employer_id = $_POST['employer_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];
        // $registration_date = $_POST['registration_date'];
        // $phone = $_POST['phone'];
        $sector = $_POST['sector'];
        $website = $_POST['website'];
        $desc = $_POST['desc'];
        $address= $_POST['address'];
        

        if (isset($_POST['employer_id'])){
            $employer_id = $_POST['employer_id'];
            if ($employer_id > 0){
                $sql ="UPDATE `employer` SET `name`='$name',`address`='$address',`website`='$website',`description`='$desc',`sector`='$sector' WHERE `id`='$employer_id'";
                echo $result = mysqli_query($conn, $sql);
            }else {
                $sql ="INSERT INTO `employer`(`name`, `address`, `website`, `description`, `sector`) VALUES ('$name','$address','$website','$desc','$sector')";
                echo $result = mysqli_query($conn, $sql);
            }  
        }
    
?>

