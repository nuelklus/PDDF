<?php
    include_once '../config.php';
    
    // Initialize response
    $response = array( 
        'status' => 0, 
        'message' => ''
    );
    
        $user_id = $_POST['user_id'];
        $company_name = $_POST['company_name'];
        $location = $_POST['email'];
        $address = $_POST['address'];
        $website = $_POST['website'];
        $description = $_POST['description'];
        $firstname = $_POST['first_name'];
        $surname = $_POST['surname'];
        $date_founded = $_POST['date_founded'];
        $sector = $_POST['sector'];
        $facebook= $_POST['facebook'];
        $twitter= $_POST['twitter'];
        $linkedin= $_POST['linkedin'];
        $email= $_POST['email'];
        $phone_number= $_POST['phone_number'];
        

        if (isset($_POST['user_id'])){
            //Get employer Id
            $employer_id = 0;
            $sql= "select id from employer Where userid = $user_id";
            $result = $link->query($sql);
         
            if ($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $employer_id =  $row["id"];
                }

            }

           
            if ($employer_id > 0){
                $sql ="UPDATE `employer` SET 
                `company_name`='$company_name',
                `location`='$location',
                `address`='$address',
                `website`='$website',
                `description`='$description',
                `firstname`='$firstname',
                `surname`='$surname',
                `date_founded`='$date_founded',
                `sector`='$sector',
                `facebook`='$facebook',
                `twitter`='$twitter',
                `linkedin`='$linkedin',
                `email`='$email',
                `phone_number`='$phone_number'
                WHERE `id`='$employer_id'";

                if ($link->query($sql) === TRUE) { 
                    $response['status'] = 1;
                    $response['message'] = "Employer profile updated successfully!";
                    $response['employerId'] =  $employer_id;
                    $response['userId'] = $user_id; 
                }
                else{
                    $response['status'] = 0;  
                    $response['message'] = $link->error;
                    $response['userId'] = $user_id;      
                }
                //print_r($link);
            }
            else {
                $sql ="INSERT INTO `employer`(
                    `company_name`, 
                    `location`, 
                    `address`, 
                    `website`, 
                    `description`,
                    `userId`,
                    `firstname`,
                    `surname`,
                    `date_founded`,
                    `sector`,
                    `facebook`,
                    `twitter`,
                    `linkedin`,
                    `email`,
                    `phone_number`
                    ) 
                    VALUES (
                    '$company_name',
                    '$location',
                    '$address',
                    '$website',
                    '$description',
                    '$user_id',
                    '$firstname',
                    '$surname',
                    '$date_founded',
                    '$sector',
                    '$facebook',
                    '$twitter',
                    'linkedin',
                    'email',
                    'phone_number'
                    )";
                    
                    if ($link->query($sql) === TRUE) { 
                        $response['status'] = 1;
                        $response['message'] = "Employer profile created successfully!";
                        $response['employerId'] =  $employer_id;
                        $response['userId'] = $user_id; 
                    }
                    else{
                        $response['status'] = 0;  
                        $response['message'] = $link->error;
                        $response['userId'] = $user_id;      
                    }
                    //print_r($link);
                }     
        }

        echo json_encode($response);
        $link->close();
?>

