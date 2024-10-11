<?php
session_start();

function downloadChecker($memberType) {
//Set the timing for seconds 
    $waitTime = 5;

// Initialize session variables if they don't exist
    if (!isset($_SESSION['prev_download'])) {
        $_SESSION['prev_download'] = 0;
    }
    if (!isset($_SESSION['download_count'])) {
        $_SESSION['download_count'] = 0;
    }

// Get the current time
    $currentTime = time();

// Handle logic for non-members (for non-member only able to download once)
    if ($memberType === 'nonmember') {
        if ($currentTime - $_SESSION['prev_download'] < $waitTime) {
            return "Too many downloads. Please wait.";
        }
// Allow download for non-members
        $_SESSION['prev_download'] = $currentTime;
        $_SESSION['download_count'] = 1; 
        return "Your download is starting..";
    }

// Handle logic for members (for member able to download two times)
    if ($memberType === 'member') {
// Check if the member must wait
        if ($_SESSION['download_count'] >= 2 && $currentTime - $_SESSION['prev_download'] < $waitTime) {
            return "Too many downloads. Please wait.";
        }

// If the member wait more than 5 seconds, the download count will be reset
        if ($currentTime - $_SESSION['prev_download'] >= $waitTime) {
            $_SESSION['download_count'] = 0;
        }

// Allow to download and count download
        $_SESSION['download_count']++;
        $_SESSION['prev_download'] = $currentTime;

        return "Your download is starting..";
    }

    return "Invalid member type.";
}

// Handle AJAX request
if (isset($_POST['memberType'])) {
    $response = downloadChecker($_POST['memberType']);
    echo $response;
    exit;
}
?>

