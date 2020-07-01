<?php
    include_once 'connect.php';
    
    
        $post_id = $_POST['post_id'];
        $title = $_POST['title'];
        $sector = $_POST['sector'];
        $level = $_POST['level'];
        $desc = $_POST['desc'];
        $requirement = $_POST['requirement'];
        $salary = $_POST['salary'];
        $expiredate = $_POST['expiredate'];
        $employment_type = $_POST['employment_type'];
        $loc = $_POST['loc'];
        $employment_id = $_POST['employment_id'];
        $createdate = $_POST['createdate'];

        if (isset($_POST['post_id'])){
            $post_id = $_POST['post_id'];
            if ($post_id > 0){
                $sql ="UPDATE `post` SET `title`= '$title' ,`sector`='$sector',`job_level`= '$level',`job_description`='$desc',`requirement`='$requirement',
                `job_location`='$loc',`salary`='$salary',`employer_id`='1',`create_date`='$createdate',`expire_date`='$expiredate',`employment_type`='$employment_type' 
                WHERE `id`='$post_id' ";
                echo $result = mysqli_query($conn, $sql);
            }else {
                $sql ="INSERT INTO post (title, sector, job_level, job_description, requirement, job_location, salary, employer_id, create_date, expire_date, employment_type) 
                VALUES ('$title', '$sector', '$level', '$desc', '$requirement', '$loc', '$salary', '$employment_id', '$createdate', '$expiredate', '$employment_type')";
                echo $result = mysqli_query($conn, $sql);
            }  
        }
    
?>
