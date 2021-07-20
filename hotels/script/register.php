<?php
// Include config file
require_once "config.php";
 
// Initialize response
$response = array( 
    'status' => 0, 
    'message' => '',
    'userId' => 0,
    'username' => ''
);

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $phone_number = $role = "";
$username_err = $password_err = $confirm_password_err = "";
$firstName =  $lastName = $email = $phone_number = $role = $sector = "";
$userId = 0;

if(isset($_POST["LastName"])){
    $lastName = trim($_POST["LastName"]);
}
if(isset($_POST["LastName"])){
    $lastName = trim($_POST["LastName"]);
}
if(isset($_POST["FirstName"])){
    $firstName = trim($_POST["FirstName"]);
}
if(isset($_POST["Email"])){
    $email = trim($_POST["Email"]);
}
if(isset($_POST["PhoneNumber"])){
    $phone_number = trim($_POST["PhoneNumber"]);
}
if(isset($_POST["Sector"])){
    $sector = trim($_POST["Sector"]);
}
if(isset($_POST["Role"])){
    $role = trim($_POST["Role"]);
    
    if($role == "Admin")
        $role = 0;
    elseif($role == "Employer")
        $role = 1;
    elseif($role == "Candidate")
        $role = 2;
}


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["UserName"]))){
        $response['status'] = 0;  
        $response['message'] = $username_err = "Please enter a username.";
    } 
    else{
        // Set parameters
        $username = trim($_POST["UserName"]);

        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = '$username'";
        $results = $link->query($sql);
        
        // Check if username already exist
        if($results->num_rows > 0){
            $response['status'] = 0;  
            $response['message'] = $username_err = "This username is already taken.";
            
            // Close connection
            mysqli_close($link);

            echo json_encode($response);
            return;
        } 
        else{
            $response['username'] = $username;
        } 
    }
    
    // Validate password
    if(empty(trim($_POST["Password"]))){
        $response['status'] = 0;  
        $response['message'] = $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["Password"])) < 6){
        $response['status'] = 0;  
        $response['message'] = $password_err = "Password must have at least 6 characters.";
    } 
    else{
        $password = trim($_POST["Password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["ConfirmPassword"]))){
        $response['status'] = 0;  
        $response['message'] = $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["ConfirmPassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $response['status'] = 0;  
            $response['message'] = $confirm_password_err = "Password did not match.";
        }
    }
    
    // Create hash password
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
     
        $sql = "INSERT INTO users (`username`, `password`, `email`, `phone_number`, `role`) 
        VALUES ('$username', '$hashPassword', '$email', '$phone_number', '$role')";
        
        if ($link->query($sql) === TRUE) {
            $userId = $link->insert_id;
            $response['userId'] =  $userId;
        }
        else{
            $response['status'] = 0;  
            $response['message'] = $link->error;      
        }
        
        // Candidate = 2
        if($role == '2'){
            // Prepare an insert statement
            $sql = "INSERT INTO `candidate` (`firstname`, `surname`, `userId`, `sector`) VALUES 
            ('$firstName', '$lastName', $userId, '$sector')";
                 
            if ($link->query($sql) === TRUE) { 
                $response['status'] = 1;  
                $response['message'] = 'Success! User account created.';
                
            }
            else{
                $response['status'] = 0;  
                $response['message'] = $link->error;
            } 
        }
        else if($role == '1'){
            // Prepare an insert statement
            $sql = "INSERT INTO `employer` (`companyname`, `firstname`, `surname`, `userId`, `sector`, `email`, `phone_number`) 
            VALUES (?, $firstname, $lastName, $userId, $sector, $email, $phone_number)";
 
            if ($link->query($sql) === TRUE) { 
                    $response['status'] = 1;  
                    $response['message'] = 'Success! User account created.';
                }
                else{
                    $response['status'] = 0;  
                    $response['message'] = $stmt->error;
                }
            }
        
        }
    
    
    // Close connection
    mysqli_close($link);

    echo json_encode($response);

    return;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>