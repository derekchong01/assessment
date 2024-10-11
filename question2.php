<!DOCTYPE html>
<html>
<style>
    body {
        font-family: Arial, sans-serif;
        background: lightblue url("img_tree.gif") no-repeat fixed center;
    }
    p {
        font-size: 18px;
    }
 </style>
<body>
<script>
// Question 2
//Kiki and Sam, who are good friends working in the catering industry, plan to implement a discount promotion in their POS system. The promotion offers a 10% discount for purchases over 500, a 5% discount for purchases under 500, but no discount for purchases below 100.
// References Used:https://www.youtube.com/watch?v=BBQpJ_FqHiA
</script>
<?php
function checkDiscount($purchaseValue) {
// Initialize the message variable
    $message = '';

    // Using conditional statement to determine the value to see if have discount
    if ($purchaseValue >= 500) {
        $message = "Purchase Value is $purchaseValue, discount is 10%.";
    } elseif ($purchaseValue >= 100) {
        $message = "Purchase Value is $purchaseValue, discount is 5%.";
    } else {
        $message = "Purchase Value is $purchaseValue, there are no discounts.";
    }

    return $message;  // Return the message instead of echo it
}

// To displya the value result to determine if there discount
echo checkDiscount(80) . "<br>"; 
echo checkDiscount(300) . "<br>";   
echo checkDiscount(500) . "<br>";  
?>

</body>
</html>
