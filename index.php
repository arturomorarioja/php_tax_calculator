<?php

// The "Calculate" button has been pressed
if (isset($_POST['txtAmount']) && isset($_POST['txtTaxPercent'])) {
    $amount = (float) $_POST['txtAmount'];
    $taxPercent = (float) $_POST['txtTaxPercent'];
} else {    // The page has just been loaded
    $amount = 0;
    $taxPercent = 0;
}

// Calculations take place anyway
$tax = round(($taxPercent * $amount) / 100, 2);        
$finalAmount = round($amount - $tax, 2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tax calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css"></style>
</head>
<body>
    <header>
        <h1>Tax calculator</h1>
    </header>
    <main>
        <form id="frmTax" action="index.php" method="POST">
            <label for="txtAmount">Monetary amount</label><br>
            <input type="text" id="txtAmount" name="txtAmount" 
                value="<?=$amount ?>" pattern="\d*(\.\d{0,2})?" required><br>
            <label for="txtTaxPercent">Tax percentage</label><br>
            <input type="text" id="txtTaxPercent" name="txtTaxPercent" 
                value="<?=$taxPercent ?>" pattern="(\d{0,2}\.)?\d{0,2}" required><br>
            <input type="submit" value="Calculate">
        </form>
        <div id="results">
            Tax amount: <span id="tax"><?=$tax ?></span><br>
            Final amount: <span id="final"><?=$finalAmount ?></span>
        </div>
    </main>
    <footer>
        <p>&copy; 2021 Arturo Mora-Rioja</p>
    </footer>
</body>
</html>