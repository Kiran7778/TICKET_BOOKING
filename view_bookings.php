<?php
$conn = new mysqli("localhost", "root", "", "ticket_booking");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM bookings ORDER BY booking_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Bookings</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Seat Number</th>
                    <th>Payment Status</th>
                    <th>Approval Status</th>
                    <th>Allocation Date</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['seat_number']; ?></td>
                        <td><?php echo $row['payment_status']; ?></td>
                        <td><?php echo $row['approval_status']; ?></td>
                        <td><?php echo $row['allocation_date']; ?></td>
                        <td><?php echo $row['booking_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
