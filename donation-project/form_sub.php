<?php

include_once "./helpers.php";

$servername = "localhost";
$username = "oseform";
$password = "ose1234@";
$dbname = "don_form";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $cell_number = htmlspecialchars($_POST["cell_number"]);
    $address = htmlspecialchars($_POST["address"]);
    $donation_reason = htmlspecialchars($_POST["donation_reason"]);
    $city = htmlspecialchars($_POST["city"]);
    $amount = htmlspecialchars($_POST["amount"]);
    $email = htmlspecialchars($_POST["email"]);
    $agreed_to_terms = isset($_POST["agreed_to_terms"]) ? 1 : 0;

    // Insert data into the database
    $sql = "INSERT INTO donations (name, cell_number, address, donation_reason, city, amount, email, agreed_to_terms)
            VALUES ('{$name}', '{$cell_number}', '{$address}', '{$donation_reason}', '{$city}', '{$amount}', '{$email}', '{$agreed_to_terms}')";

    if ($conn->query($sql) === true) {
        echo "Donation Recieved!...";
        redirect('./');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
