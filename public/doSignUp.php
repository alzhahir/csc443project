<!DOCTYPE html>
<html>
    <head>
        <title>Processing request...</title>
    </head>
    <body>
        <h1>Authenticating...</h1>
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            echo "<p>Processing your sign up request...</p>";
            // Include config file
            require "inc/connect.php";

            // Define variables and initialize with empty values
            //$username = $password = $confirm_password = "";
            //$username_err = $password_err = $confirm_password_err = "";
        
            // Processing form data when form is submitted
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                echo "<p>Please wait for a few seconds.</p>";
                $email = $_POST["email"];
                if(empty(trim($_POST["email"]))){
                    $email_err = "Please enter an email.";
                    die($email_err);
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                    die($emailErr);
                }

                // Validate password
                if(empty(trim($_POST["password"]))){
                    $password_err = "Please enter a password.";
                    die($password_err);
                } elseif(strlen(trim($_POST["password"])) < 8){
                    $password_err = "Password must have atleast 8 characters.";
                    die($password_err);
                } else{
                    $password = trim($_POST["password"]);
                }

                // Validate confirm password
                if(empty(trim($_POST["confirmPassword"]))){
                    $confirm_password_err = "Please confirm password.";
                    die($confirm_password_err);
                } else{
                    $confirm_password = trim($_POST["confirmPassword"]);
                    if(empty($password_err) && ($password != $confirm_password)){
                        $confirm_password_err = "Password did not match.";
                        die($confirm_password_err);
                    }
                }

                $password = password_hash($password, PASSWORD_DEFAULT);
                echo $password;
                echo $_POST["name"]."<br>";
                echo $_POST["telephone"]."<br>";
                echo $_POST["role"];
                
            } else {
                echo "<p>Invalid method.</p>";
            }
        ?>
    </body>
</html>