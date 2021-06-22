<?php
    include_once 'connect.php';
    
    
        $candidate_id = $_POST['candidate_id'];
        $profession = $_POST['profession'];
        $loc = $_POST['loc'];
        $expected_salary = $_POST['expected_salary'];
        

        if (isset($_POST['candidate_id'])){
            $candidate_id = $_POST['candidate_id'];
            if ($candidate_id > 0){
                $sql = "UPDATE `candidate` SET `profession`='$profession',`location`='$loc',`expected_salary`='$expected_salary' WHERE `id`='$candidate_id'";
                echo $result = mysqli_query($conn, $sql);
            }else {
                $sql ="INSERT INTO `candidate`(`profession`, `location`, `expected_salary`) VALUES ('$profession','$loc','$expected_salary')";
                echo $result = mysqli_query($conn, $sql);
            }  
        }
    
?>
