<!DOCTYPE html>
<html>
<body>

<?php
// Write a function:
// How Can We Know The Number Of Days Between Two Given Dates Using PHP? Is The Day Odd Or Even. (This question can be played in any form freely)

$to_date = time();  
$from_date = strtotime("2024-10-01");  // Timestamp for October 1, 2024
$day_diff = $to_date - $from_date;  // Difference in seconds
$days = floor($day_diff / (60 * 60 * 24));  // Convert seconds to days

// Output the number of days
echo "The difference between today and 1st October 2024: $days <br>";

// Check if the number of days is odd or even
if ($days % 2 == 0) {
    echo "The number of days is $days so the answer is even.";
} else {
    echo "The number of days is $days so the answer is odd.";
}
?>

</body>
</html>