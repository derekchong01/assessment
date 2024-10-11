<!DOCTYPE html>
<html>
<body>

<?php

// Define item rarity and vip ranks
$item_tier_rarity = [1, 2, 3, 4, 5, 6 ,7, 8]; // 1 = common, 5 = legend , higher rank 6,7,8
$vip_rank = ['vip1', 'vip2', 'vip3', 'vip4', 'vip5']; // VIP ranks

// Provide probabilities for each VIP rank for possible item obtained 
$probabilities = [
    'vip1' => [0.7, 0.3, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0], 
    'vip2' => [0.5, 0.4, 0.1, 0.0, 0.0, 0.0, 0.0, 0.0], 
    'vip3' => [0.4, 0.3, 0.2, 0.1, 0.0, 0.0, 0.0, 0.0], 
    'vip4' => [0.25, 0.25, 0.25, 0.15, 0.05, 0.04, 0.01, 0.0], 
    'vip5' => [0.2, 0.2, 0.2, 0.14, 0.14, 0.08, 0.03, 0.01],
];

// Function to roll an item based on VIP rank
function roll_item($vip_rank) {
    global $item_tier_rarity, $probabilities;

// Get the probability distribution for the specific VIP rank
    $probability = $probabilities[$vip_rank];

// Generate a random number to select an item based on probabilities
    $rand = mt_rand() / mt_getrandmax(); // Random float between 0 and 1
    $cumulative = 0;

// Use count($item_tier_rarity) to avoid magic numbers
    for ($i = 0; $i < count($item_tier_rarity); $i++) {
        $cumulative += $probability[$i];
        if ($rand <= $cumulative) {
            return $item_tier_rarity[$i]; // Return the item rarity based on the selected range
        }
    }
}

function roll_items_for_vips($num_rolls = 100) {
    global $vip_rank, $item_tier_rarity;

// Initialize the results array to store counts for each VIP rank
    $results = [];

// Loop through each VIP rank
    foreach ($vip_rank as $rank) { // Changed $vip_rank to $rank to avoid confusion
// Initialize item counts for this VIP rank
        $results[$rank] = array_fill_keys(range(1, count($item_tier_rarity)), 0);

// Perform the specified number of item rolls
        for ($i = 0; $i < $num_rolls; $i++) {
            $item = roll_item($rank); // Pass the correct variable
            $results[$rank] = array_fill_keys($item_tier_rarity, 0);

        }
    }

// Display the results
    echo "<pre>"; // Use <pre> for formatted output
    foreach ($results as $rank => $distribution) {
        echo "$rank: Array ( ";
        foreach ($distribution as $rarity => $count) {
            echo "[$rarity] => $count ";
        }
        echo ")\n";
    }
    echo "</pre>"; // Close <pre>
}

// Call the function to roll items
roll_items_for_vips();

?>


</body>
</html>




