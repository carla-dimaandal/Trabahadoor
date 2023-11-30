<?php

    include 'config.php';

$file = $_GET['Resume']; // Get the file name from the query parameter

// Check if the file exists
if (file_exists($file)) {
    // Set headers to force download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file); // Read and output the file
    exit;
} else {
    // File not found
    http_response_code(404);
    echo "File not found.";
}
?>






