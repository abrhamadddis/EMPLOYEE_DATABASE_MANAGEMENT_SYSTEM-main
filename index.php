<?php include 'handle.php';
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style-index1.css">
    <title>Add Civil-servant</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav class="nav1">
        <ul>
            <li><a href="logout.php" onclick="return confirm('Do you want to logout?')"><button>Signout</button></a></li>
            <li class="nav"><a href="reset-password.php">Change Password</a></li>
            <li class="nav"><a href="contactUs.html">Contact Us</a></li>
            <li class="nav"><a href="index.php">Register</a></li>
            <li class="nav"><a href="search.php">Display</a></li>
            <li class="nav"><a href="welcome.php">Home</a></li>
        </ul>
    </nav>
    <section class="container">
        <div class="container-admin">
            <h1>Fill the form below</h1>
        </div>
        <div class="container form-login">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="container-inputs">
                    <input type="text" name="first_name" value="" placeholder="First Name"><br>
                    <input type="text" name="last_name" value="" placeholder="Last Name"><br>
                    <input type="text" name="sector" value="" placeholder="Sector"><br>
                    <input type="text" name="id" value="" placeholder="ID"><br>
                </div>
                <div class="container-gender">
                    <label>Gender</label>
                    <select name="gender">
                        <option class="op" value="male">Male</option>
                        <option class="op" value="female">Female</option><br>
                    </select>
                </div>
                <div class="container-file">
                    <h1>Upload Files</h1>
                    <input type="file" name="myfile"><br>
                </div>
                <div class="container-button">
                    <button type="submit" name="save">SUBMIT</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>