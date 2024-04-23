<?php
// Include the file containing the createClassDirectory() function
include 'createClassDirectory.php';

// Check if file is uploaded successfully and class_id is set
if(isset($_FILES['fileInput']) && isset($_POST['class_id'])) {
    $file = $_FILES['fileInput'];
    $class_id = $_POST['class_id'];

    // Call the createClassDirectory() function to ensure the directory exists
    createClassDirectory($class_id);
    $permissions = 0777;

    // File details
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Destination directory path
    $destinationDir = '/home/group2/public_html/' . $class_id . '/';
    if (chmod($destinationDir, $permissions)) {
        echo "Permissions changed successfully!";
    } else {
        echo "Error changing permissions!";
    }

    // Move uploaded file to the server directory
    move_uploaded_file($fileTmpName, $destinationDir . $fileName);
    echo "file uploaded";
    
    // Redirect or provide response to the user
}
?>
