<?php
// Initialize the session
session_start();
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$conn = mysqli_connect('localhost', 'root' , '',   'file-management');

$sql = "SELECT * FROM sector2";
if (isset($_POST['displayAll'])) {
 $sql = "SELECT * FROM users"; 
}
if (isset($_POST['clearDisplay'])) {
 $sql = "SELECT * FROM sector2"; 
}
$result = mysqli_query($conn, $sql);    
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['search'])) {
$searchName = $_POST['id'];
 
$sql = "SELECT * FROM users WHERE idno LIKE '$searchName%'";          
$result = mysqli_query($conn, $sql);    
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
if (isset($_POST['sector_search'])) {
$searchName = $_POST['sector'];
 
$sql = "SELECT * FROM users WHERE sector LIKE '$searchName%'";          
$result = mysqli_query($conn, $sql);    
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file tuple to download from database 
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name']; 

header("Content-type: application/pdf"); 
header("Content-Length: " . filesize($filepath)); 
readfile($filepath); 
}

if (isset($_GET['file_name'])) {
    $id = $_GET['file_name'];

    // fetch file tuple to download from database 
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

       
    }

}
?>
<?php include 'style1.css';
      include 'head.html'   ?>
<!DOCTYPE html>
<html lang="en">
  <head> 

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Search</title>

  
</head>

  <body>
    <section>
      <div class="container">
        
        <form class="dispClearBtns" action="search.php" method="post">
          <button class="displayBtn" type="submit" name="displayAll">Display All</button>
          <button class="clearBtn" type="submit" name="clearDisplay">Clear Display</button>
        </form>
        
        <form class="searchId" action="search.php" method="post">
          <h4> Search By ID Number</h4>
          <input class="inputId" type="text" placeholder="" name="id" value="">
          <button class="idBtn" type="submit" name="search">Search</button>
        </form>
        
        <form class="searchSector" action="search.php" method="post">
          <h4>Search By Sector</h4>
          <input class="inputSector" type="text" placeholder="" name="sector" value="">
          <button class="sectorBtn" type="submit" name="sector_search">Search</button>
        </form>
    </div>
<table class="list">
<thead>
  <tr>
    <th>ID</th>   
    <th>First Name</th>
    <th>Last Name</th>
    <th>ID No</th>
    <th>Sector</th>
    <th>size</th>
    <th>Filename</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['id']; ?></td>      
      <td><?php echo $file['fstn']; ?></td>
      <td><?php echo $file['lstn']; ?></td>
      <td><?php echo $file['idno']; ?></td>
      <td><?php echo $file['sector']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['name']; ?></td>
      <td><a target="_blank" href="search.php?file_id=<?php echo $file['id'] ?>">View</a>
          <a href="search.php?file_name=<?php echo $file['id'] ?>">Download</a></td>
    </tr>
  <?php endforeach;?>
</tbody>
</table>
</section>
  </body>
</html>