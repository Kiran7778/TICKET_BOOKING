<?php
// Database connection
$servername = "localhost"; // or your server address
$username = "root"; // your username
$password = ""; // your password
$dbname = "ticket_booking"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$user_id = $_POST['user_id'];
$seat_number = $_POST['seat_number'];
$payment_status = $_POST['payment_status'];
$approval_status = $_POST['approval_status'];

// Insert booking into the database
$booking_date = date('Y-m-d H:i:s'); // Current date and time
$allocation_date = $approval_status == 'Approved' ? $booking_date : null;

$sql = "INSERT INTO bookings (user_id, seat_number, payment_status, approval_status, allocation_date, booking_date)
        VALUES ('$user_id', '$seat_number', '$payment_status', '$approval_status', '$allocation_date', '$booking_date')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
