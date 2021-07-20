<?php
    include_once 'config.php';
    
    
        $candidate_id = $_POST['candidate_id'];
        $profession = $_POST['profession'];
        $loc = $_POST['loc'];
        $expected_salary = $_POST['expected_salary'];
        

        if (isset($_POST['candidate_id'])){
            $candidate_id = $_POST['candidate_id'];
            if ($candidate_id > 0){
                $sql = "UPDATE `candidate` SET 
                `profession`= '$profession',
                `location`=' $loc',
                `expected_salary`= '$expectedSalary',
                `job_title`= '$jobTitle',
                `location`= '$location',
                `sector`= '$sector',
                `resume`= '$resume',
                `path`= '$path',
                `firstname`= '$firstName',
                `surname`= '$surname',
                `dob`= '$dob',
                `gender`= '$gender',
                `facebook`= '$facebookLink',
                `twitter`= '$twitterLink',
                `linkedin`= '$linkedinLink' 
                WHERE `userId`= '$userId'";
                echo $result = mysqli_query($conn, $sql);
            }
            else {
                $sql ="INSERT INTO `candidate`(`profession`, `location`, `expected_salary`) 
                VALUES ('$profession','$loc','$expected_salary')";
                echo $result = mysqli_query($conn, $sql);
            }
        }
    
?>
