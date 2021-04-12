<?php 
    session_start();
    
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        header("location: ../");
        exit();
    }

    require_once "../models/database.php";
    
    $username = $password = "";
    $username_error = $password_eror = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"])))
        {
            $username_error = "Please enter a username";
        }
        else
        {
            $username = trim($_POST["username"]);
        }
        if(empty(trim($_POST["password"])))
        {
            $password_error = "Please enter a password";
        }
        else
        {
            $password = trim($_POST["password"]);
        }
    
        if(empty($username_error) && empty($password_error)){
            $sql = "SELECT id, username, password FROM users WHERE username = :username";
            if ($stmt = $db->prepare($sql)) {
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $param_username = trim($_POST["username"]);
    
                if($stmt->execute()){
                    if($stmt->rowCount() == 1){
                        if($row = $stmt->fetch()){
                            $id  = $row["id"];
                            $username = $row["username"];
                            $hashed_password = $row["password"];
                            if(password_verify($password, $hashed_password)){
                                //password match 
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                header("Location: ../product_manager");
    
                            }
                            else{
    
                                    $password_error = "The password entered was not valid!";
                            }
                        } 
                    } 
                    else
                    {
    
                        $username_error = "No account was found with this username";
                    }
                }
                else
                {
                    echo "Unfornately something went wrong, please try again later";
                }
            }
            unset($db);
        }
    
        include '../views/header.php';
    
    }
?>

<main>
    <h1>Login</h1>
    <p>Please enter your credentials</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="add_product_form">
        <div <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>></div>
        <div <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>></div>
    </form>
</main>