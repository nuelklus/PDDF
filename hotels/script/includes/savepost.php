<?php
    include_once '../config.php';
     
    // Initialize response
    $response = array( 
        'status' => 0, 
        'message' => '',
        'userId' => 0,
    );

    if (isset($_POST['post_id'])){ 
        $post_id = $_POST['post_id'];
        $title = $_POST['title'];
        $sector = $_POST['sector'];
        $educational_level = $_POST['educational_level'];
        $desc = $_POST['desc'];
        $requirement = $_POST['requirement'];
        $salary = $_POST['salary'];
        $expiredate = $_POST['expire_date'];
        $employment_type = $_POST['employment_type'];
        $location = $_POST['location'];
        $user_id = $_POST['user_id'];
        $createdate = $_POST['createdate'];
        $experience = $_POST['experience'];

        $cleanexpireddate = $expiredate == null || $expiredate == '' || $expiredate == 'null'   ? 'NULL' : "'$expiredate'";

            if ($post_id > 0){
                $sql ="UPDATE `post` SET 
                `title`= '$title' ,
                `sector` = '$sector',
                `educational_level` = '$educational_level',
                `description` = '$desc',
                `requirement` = '$requirement',
                `location` = '$location',
                `salary`='$salary',
                -- `employer_id`= '$employer_id',
                -- `created_date` = '$createdate',
                `expire_date` = '$cleanexpireddate',
                `employment_type` = '$employment_type',
                `experience` = '$experience'
                WHERE `id` = '$post_id' ";

                 if ($link->query($sql) === TRUE) { 
                     $response['status'] = 1;
                     $response['message'] = "Post updated successfully!";
                     $response['postId'] =  $post_id;
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
                $sql ="INSERT INTO post (
                    `title`, 
                    `sector`, 
                    `skill`, 
                    `educational_level`, 
                    `description`, 
                    `requirement`, 
                    `location`, 
                    `salary`, 
                    `employer_id`,
                    -- `created_date`,
                    `expire_date`, 
                    `employment_type`,
                    `experience`
                    ) 
                VALUES (
                    '$title', 
                    '$sector', 
                    '$level', 
                    '$educational_level', 
                    '$desc', 
                    '$requirement', 
                    '$location', 
                    '$salary', 
                    (SELECT id FROM employer WHERE employer.userId = $user_id),
                    -- '$employer_id',
                    -- '$created_date',
                    '$cleanexpireddate, 
                    '$employment_type',
                    '$experience'
                    )";
                echo($sql);    

                if ($link->query($sql) === TRUE) {
                    $post_id = $link->insert_id;
                    $response['status'] = 1;
                    $response['message'] = "Post created successfully!";
                    $response['postId'] = $post_id;
                    $response['userId'] = $user_id; 
                }
                else{
                    $response['status'] = 0;  
                    $response['message'] = $link->error;
                    $response['userId'] = $user_id;      
                }
            } 

            echo json_encode($response);  
        }
    
?>
