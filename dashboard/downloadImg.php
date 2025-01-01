<?php

require "dbconnection.php";
// Directory where images are stored
$imageDirectory = 'contracts/';  // Make sure this directory exists and contains your images





// Check if 'id' is passed via GET request
if (isset($_GET['id'])) {
    // Get the image ID from the URL
    $imageId = intval($_GET['id']);

    // Prepare and execute the SQL query to retrieve the image name
    $query = "SELECT contract FROM tenants WHERE mobileNumber = '$imageId'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $imageId);
    $stmt->execute();
    $stmt->bind_result($imageName);
    $stmt->fetch();

    // Check if the image file exists in the directory
    $filePath = $imageDirectory . $imageName;
    if (file_exists($filePath)) {
        // Set headers to force download
        header("Content-Disposition: attachment; filename=\"$imageName\"");
        header("Content-Length: " . filesize($filePath));

        // Output the file content
        readfile($filePath);
    } else {
        echo "The requested image does not exist.";
    }

    // Clean up
    $stmt->close();
} else {
    echo "No image ID provided.";
}

$conn->close();
?>

