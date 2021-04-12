<?php 
session_start();

require_once "../models/database.php";

# $db = mysqli_connect($dsn, $username, $password);

$username = "";
$email = "";
$reg_errors = array();

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if (empty($username)) { array_push($reg_errors, "Username is required"); }
    if (empty($email)) { array_push($reg_errors, "Email is required"); }
    if (empty($password_1)) { array_push($reg_errors, "Password is required"); }
    if (empty($password_2)) { array_push($reg_errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($reg_errors, "The two passwords do not match");
    }

    if ($user) {
        if ($user['username'] === $username) {
            array_push($reg_errors, "Username already exists");
        }

        if ($user['email'] == $email) {
            array_push($reg_errors, "Email already exists");
        }
    }

    if (count($reg_errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT);

        $query = "INSERT INTO users ('username', 'email', 'passwrd')
                  VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: ../index.php');
    }
}

include '../views/header.php';
?>

<main>
    <h2>Register</h2>
    <form method="post" action="registration.php">
        <?php include('../errors/reg_errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" />
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div> 
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <input type="submit" class="btn" name="reg_user" value="Register" />
        </div>
        <p>Already a member? <a href="login.php">Sign In</a></p>
    </form>
</main>

<? include '../views/footer.php' ?>