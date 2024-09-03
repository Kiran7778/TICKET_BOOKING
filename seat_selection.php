<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = intval($_POST['user_id']);
    $seat_number = $_POST['seat_number'];
    $payment_status = $_POST['payment_status'];
    $approval_status = $_POST['approval_status'];
    $allocation_date = $_POST['allocation_date'];

    $conn = new mysqli("localhost", "root", "", "ticket_booking");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, seat_number, payment_status, approval_status, allocation_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $seat_number, $payment_status, $approval_status, $allocation_date);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "<script>alert('Booking successful!');</script>";
}

$user_id = intval($_GET['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Seat Selection</h2>
        <form method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="form-group">
                <label for="seat_number">Seat Number:</label>
                <input type="text" class="form-control" id="seat_number" name="seat_number" required>
            </div>
            <div class="form-group">
                <label for="payment_status">Payment Status:</label>
                <select class="form-control" id="payment_status" name="payment_status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="approval_status">Approval Status:</label>
                <select class="form-control" id="approval_status" name="approval_status">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                </select>
            </div>
            <div class="form-group">
                <label for="allocation_date">Allocation Date and Time:</label>
                <input type="datetime-local" class="form-control" id="allocation_date" name="allocation_date" required>
            </div>
            <button type="submit" class="btn btn-success">Book Seat</button>
        </form>
    </div>
</body>
</html>
