<?php
// Database credentials
$servername = "localhost";  // Change this to your MySQL server hostname
$username = "root";     // Change this to your MySQL username
$password = " ";     // Change this to your MySQL password
$dbname = "test";  // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$studentName = $_POST['StudentName'];
$studentID = $_POST['StudentID'];
$studentContact = $_POST['StudentNumber'];
$studentEmail = $_POST['StudentEmail'];
$programme = $_POST['StudentProgramme'];
$amount = $_POST['Amount'];
$paymentMethod = $_POST['payment_method'];

// Prepare and bind SQL statement
$sql = "INSERT INTO StudentPayments (StudentName, StudentID, StudentContact, StudentEmail, Programme, Amount, PaymentMethod) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssdss", $studentName, $studentID, $studentContact, $studentEmail, $programme, $amount, $paymentMethod);

// Execute SQL statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
