<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <style>
        *{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        h2{
            background-color: rgb(255, 131, 82);
            color: white;
            padding: 10px;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color:rgb(255, 220, 174);
        }
        form{
            padding: 10px;
        }
        label{
            font-weight: bold;
        }
        input[type=submit]{
            background-color: orangered;
            color: white;
            padding: 5px;
        }
    </style>
</head>
<body>
<h2>Enter Electricity Bill Details</h2>
<fieldset>
<form method="post">
    <label>Full Name: </label><input type="text" name="fullname" required><br><br>
    <label>Address: </label><input type="text" name="address" required><br><br>
    <label>Kilowatt Consumed: </label><input type="number" name="kilowatt" required><br><br>
    
    <label>Subscription Type:</label><br>
    <select name="subs" required>
        <option value="">--Subscription Type--</option>
        <option value="Residential">Residential</option>
        <option value="Commercial">Commercial</option>
        <option value="Industrial">Industrial</option>
    </select><br><br>
    
    <label>Other Charges:</label><br>
    <input type="checkbox" name="disconnection"> Disconnection (250)<br>
    <input type="checkbox" name="reconnection"> Reconnection (250)<br>
    <input type="checkbox" name="late"> Late Payment (200)<br>
    <input type="checkbox" name="submeter"> Additional Submeter (800)<br>
    <input type="checkbox" name="transfer"> Submeter Transfer (500)<br><br>
    
    <label>Comments:</label><br>
    <textarea name="comments" rows="4" cols="50"></textarea><br><br>
    <div class="btn">
    <input type="submit" value="Calculate Bill">
    </div>
</form>
</fieldset>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $kilowatt = $_POST['kilowatt'];
    $subscription = $_POST['subs']; // Changed from 'subscription' to 'subs' to match select name
    $comments = $_POST['comments'];

    // Set rate based on subscription type
    $rate = 0;
    if ($subscription == "Residential") {
        $rate = 7.25;
    } elseif ($subscription == "Commercial") {
        $rate = 8.50;
    } elseif ($subscription == "Industrial") {
        $rate = 9.75;
    }

    // Calculate amount
    $amount = $kilowatt * $rate;

    // Calculate other charges
    $other_charges = 0;
    if (isset($_POST['disconnection'])) $other_charges += 250;
    if (isset($_POST['reconnection'])) $other_charges += 250;
    if (isset($_POST['late'])) $other_charges += 200;
    if (isset($_POST['submeter'])) $other_charges += 800;
    if (isset($_POST['transfer'])) $other_charges += 500;
    // Calculate total
    $total = $amount + $other_charges;

    // Display results in table
    echo "<h2>Electricity Bill Details</h2>";
    echo "<fieldset>";
    echo "<table>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>Full Name</td><td>$fullname</td></tr>";
    echo "<tr><td>Address</td><td>$address</td></tr>";
    echo "<tr><td>Kilowatt Consumed</td><td>$kilowatt</td></tr>";
    echo "<tr><td>Subscription Type</td><td>" . $subscription . "</td></tr>";
    echo "<tr><td>Rate</td><td>$rate</td></tr>";
    echo "<tr><td>Amount</td><td>$amount</td></tr>";
    echo "<tr><td>Other Charges</td><td>$other_charges</td></tr>";
    echo "<tr><td>Total Charges</td><td>$total</td></tr>";
    echo "<tr><td>Comments</td><td>$comments</td></tr>";
    echo "</table>";
    echo "</fieldset>";
}
?>