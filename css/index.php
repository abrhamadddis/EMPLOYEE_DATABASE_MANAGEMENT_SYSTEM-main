<?php include 'handle.php';

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    
    exit;
}

?>

<?php include 'style.css'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Store File</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="nav1">
        <div class="container flex">
            <h1 class="logo"><span>Gelan</span> city addministration</h1>
            <nav>
                <ul>
                    <li class="co"><a href="welcome.php">Home</a></li>
                    <li class="co"><a href="index.php">Register</a></li>
                    <li class="co"><a href="search.php">Display</a></li>
                    <li class="co"><a href="about.html">About</a></li>
                    <li><a href="logout.php" onclick="return confirm('Do you want to logout?')"><button>Sign out</button></a></li>
                </ul>

            </nav>
        </div>
    </div>
    <section class="row-login">
        <div class="container-admin">
        <h1>Please fill the form below</h1>
        </div>
        <div class="container form-login">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div>
                    
                    <input type="text" name="first_name" value="" placeholder="First Name"><br>
                </div>
                <div>
                    
                    <input type="text" name="last_name" value="" placeholder="Last Name"><br>
                </div>
                <div>
                    
                    <input type="text" name="sector" value="" placeholder="Sector"><br>
                </div>
                <div>
                    
                    <input type="text" name="id" value="" placeholder="ID"><br>
                </div>
                <div class="gender">
                    <label>Gender</label>
                    <select name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option><br>
                    </select>
                </div>

                <h1>Upload Related Files</h1>
                <div>
                    <input type="file" name="myfile"> <br>
                    <button type="submit" name="save" class="button_submit">SUBMIT</button>
                </div>
        </div>
            </form>
        </div>
    </section>
    <footer id="main-footer">
        <p>Copyright &copy; 2021 Developers</p>
    </footer>
</body>

</html>