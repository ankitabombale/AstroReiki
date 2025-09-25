

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and sanitize input
    $firstname = trim($_POST['firstname']);
    $lastname  = trim($_POST['lastname']);
    $email     = trim($_POST['email']);
    $phone     = trim($_POST['phone']);
    $message   = trim($_POST['message']);

    // Database connection
    $conn = new mysqli("localhost", "root", "", "astroreiki");

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Prepare and execute insert
    $stmt = $conn->prepare("INSERT INTO contact_form (firstname, lastname, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "Success"; // AJAX response
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
