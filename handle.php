<?php
// connect to the database
//                      host/server  user  password  DB name
$conn = mysqli_connect('localhost', 'root' , '',   'file-management');

//selecting from users table
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

//form handler for uploading file and inputs
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
 $firstname = $_POST['first_name'];
 $lastname = $_POST['last_name']; 
 $id = $_POST['id'];
 $sector = $_POST['sector'];

 $filename = $_FILES['myfile']['name'];
    

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'jpeg','PDF','JPEG'])) {
        echo "You file extension must be .pdf or .jpeg";
    }else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO users (name, size, fstn , lstn, idno, sector) VALUES ('$filename',' $size','$firstname' , '$lastname', '$id', '$sector')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully!";
            }
        }else {
            echo "Failed to upload file.";
         }
     }
}

//download handler when 'download' is pressed
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

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
