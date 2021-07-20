<?php
// Include config file
require_once "config.php";
 
// Initialize response
$response = array( 
    'status' => 0, 
    'message' => '',
    'id' => 0,
    'username' => ''
);

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $phone_number = $role = "";
$username_err = $password_err = $confirm_password_err = "";
$firstName =  $lastName = $email = $phone_number = $role = $sector = "";
$userId = 0;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["UserName"]))){
        $username_err = "Please enter a username.";
    } else{

        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
           
            // Set parameters
            $param_username = trim($_POST["UserName"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
              
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $response['status'] = 0;  
                    $response['message'] = $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["UserName"]);
                }
            } else{ 
                $response['status'] = 0;  
                $response['message'] = $username_err = "Oops! Something went wrong. Please try again later.";
            }
           
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
    }
    
    // Validate password
    if(empty(trim($_POST["Password"]))){
        $response['status'] = 0;  
        $response['message'] = $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["Password"])) < 6){
        $response['status'] = 0;  
        $response['message'] = $password_err = "Password must have atleast 6 characters.";
    } else{
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
    if(isset($_POST["Role"])){
        $role = trim($_POST["Role"]);
    }
    if(isset($_POST["Sector"])){
        $sector = trim($_POST["Sector"]);
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
     
        // Prepare an insert statement
        $sql = "INSERT INTO users (`username`, `password`, `email`, `phone_number`, `role`) VALUES (?, ?, ?, ?, ?)";
        $link->prepare($sql);
        $stmt->bind_param("sssss", $param_username, $param_password, $param_email, $param_phone_number, $param_role);
             
            // Bind variables to the prepared statement as parameters
            //mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_email, $param_phone_number, $param_role);
        
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_phone_number = $phone_number;

            if($role == "Admin")
                $param_role = 0;
            if($role == "Employer")
                $param_role = 1;
            elseif($role == "Candidate")
                $param_role = 2;

            $stmt->execute();
            //$stmt->close();
print_r($stmt);
            // Attempt to execute the prepared statement
            //if(mysqli_stmt_execute($stmt)){
                /* store result */
                //mysqli_stmt_store_result($stmt);

                $results = $stmt->error;
                //== null) {
                    $response['status'] = 0;  
                    $response['message'] = $stmt->error;
                // }
                // else
                // {
                    //Get userId
                   echo $userId = $stmt->insert_id;
                //}
            //}
            // Close statement
            //mysqli_stmt_close($stmt);
        //}      
        
        if($role == 'Candidate'){echo 'Candidate';
            // Prepare an insert statement
            $sql = "INSERT INTO `candidate` (`firstname`, `surname`, `userId`, `sector`) VALUES (?, ?, ?, ?)";
        
            if($stmt = mysqli_prepare($link, $sql)){
                print_r($stmt);
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $param_firstname, $param_lastName, $param_userId);
            
                // Set parameters
                $param_firstname = $firstname;
                $param_lastName = $lastName;
                $param_userId = $userId;
            
                // Attempt to execute the prepared statement
                $insResult = mysqli_stmt_execute($stmt);
                        
                if($insResult){
                    
                    $response['status'] = 1;  
                    $response['message'] = 'Success! User account created.';
                
                }
                else{
                    $response['status'] = 0;  
                    $response['message'] = $stmt->error;
                }
            
                print_r($stmt); 
            
            }
        }
        else if($role == 'Employer'){
            // Prepare an insert statement
            $sql = "INSERT INTO `employer` (`companyname`, `firstname`, `surname`, `userId`, `sector`, `email`, `phone_number`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";echo 'Employer';

            $stmt = $link->prepare($sql);
            $stmt->bind_param("ssssss", $param_firstname, $param_lastName, $param_userId, $param_sector, $param_email, $param_phone_number);

            // Set parameters
                $param_firstname = $firstname;
                $param_lastName = $lastName;
                $param_userId = $userId;
                $param_sector = $sector=1;
                $param_email = $email;
                $param_phone_number = $phone_number;

                // Attempt to execute the prepared statement
                $insResult = $stmt->execute();
                print_r($insResult);

            print_r(mysqli_prepare($link, $sql)); return;
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssss", $param_firstname, $param_lastName, $param_userId, $param_sector, $param_email, $param_phone_number);
            
                // Set parameters
                $param_firstname = $firstname;
                $param_lastName = $lastName;
                $param_userId = $userId;
                $param_sector = $sector=1;
                $param_email = $email;
                $param_phone_number = $phone_number;

                // Attempt to execute the prepared statement
                $insResult = mysqli_stmt_execute($stmt);
            
                if($insResult){
                    $response['status'] = 1;  
                    $response['message'] = 'Success! User account created.';
                
                }
                else{
                    $response['status'] = 0;  
                    $response['message'] = $stmt->error;
                }
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