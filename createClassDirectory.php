<?php
// Function to create directory for a specific class ID
function createClassDirectory($classID) {
    // Define the base path
    $basePath = "/home/group2/public_html/";

    // Define the path to the directory
    $directory = $basePath . $classID;

    // Check if the directory already exists
    if (!is_dir($directory)) {
        // Create the directory (folder)
        if (mkdir($directory, 0777, true)) {
            echo "Directory created successfully: " . $directory . "<br>";
        } else {
            echo "Error creating directory: " . $directory . "<br>";
        }
    } else {
        echo "Directory already exists: " . $directory . "<br>";
    }
}

// Call the function to create directory for a specific class ID

?>
