<?php
session_start();

function checkDownload($memberType) {
// Set the wait time in seconds
    $waitTime = 5;

// Initialize session variables if they don't exist
    if (!isset($_SESSION['last_download'])) {
        $_SESSION['last_download'] = 0;
    }
    if (!isset($_SESSION['download_count'])) {
        $_SESSION['download_count'] = 0;
    }

// Get the current time
    $currentTime = time();

// Check if the user is trying to download again within the wait time
    if ($currentTime - $_SESSION['last_download'] < $waitTime) {
        return "Too many downloads.";
    }

// Update the last download 
    $_SESSION['last_download'] = $currentTime;

// Handle the download logic based on member type
    if ($memberType === 'member') {
        // Allow two times downloads for members
        $_SESSION['download_count']++;

// Check download count
        if ($_SESSION['download_count'] > 2) {
            return "Too many downloads.";
        }
        return "Your download is starting..";
    } elseif ($memberType === 'nonmember') {
        // limit download count for non-members
        $_SESSION['download_count'] = 1; // only first download allowed
        return "Your download is starting..";
    }

    return "Invalid member type.";
}

// Handle AJAX request
if (isset($_POST['memberType'])) {
    $response = checkDownload($_POST['memberType']);
    echo $response;
    exit;
}
?>
