<?php
// Payment Status Page
// Sniper Photography - Abubakar Musa

require_once 'includes/db.php';

$status = isset($_GET['payment']) ? $_GET['payment'] : '';
$reference = isset($_GET['ref']) ? $_GET['ref'] : '';

$booking = null;
if (!empty($reference)) {
    $stmt = $conn->prepare("SELECT b.*, s.title as service_title FROM bookings b LEFT JOIN services s ON b.service_type = s.title WHERE b.payment_reference = ?");
    $stmt->bind_param("s", $reference);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $booking = $result->fetch_assoc();
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status | Sniper Photography</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .status-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 50px 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            border: 1px solid #e9ecef;
        }
        .status-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 48px;
        }
        .status-icon.success {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        .status-icon.failed {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        .status-icon.pending {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        .status-card h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #212529;
        }
        .status-card p {
            color: #6c757d;
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .status-card .reference {
            background: #f8f9fa;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: monospace;
            font-size: 14px;
            color: #495057;
            margin: 20px 0;
            display: inline-block;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-top: 20px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #D4AF37, #B8860B);
            color: #ffffff;
            border: none;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
        }
        .btn-outline {
            background: transparent;
            color: #212529;
            border: 2px solid #D4AF37;
        }
        .btn-outline:hover {
            background: #D4AF37;
            color: #ffffff;
        }
        .booking-details {
            text-align: left;
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
        }
        .booking-details h4 {
            margin-bottom: 15px;
            color: #212529;
            font-size: 16px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
            font-size: 14px;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-row span:first-child {
            color: #6c757d;
        }
        .detail-row span:last-child {
            color: #212529;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="status-card">
        <?php if ($status === 'success'): ?>
        <div class="status-icon success">
            <i class="fas fa-check"></i>
        </div>
        <h2>Payment Successful!</h2>
        <p>Your booking has been confirmed and payment received. Thank you for choosing Sniper Photography!</p>

        <?php if ($booking): ?>
        <div class="booking-details">
            <h4><i class="fas fa-receipt"></i> Booking Details</h4>
            <div class="detail-row">
                <span>Reference</span>
                <span><?php echo htmlspecialchars($reference); ?></span>
            </div>
            <div class="detail-row">
                <span>Client</span>
                <span><?php echo htmlspecialchars($booking['client_name']); ?></span>
            </div>
            <div class="detail-row">
                <span>Service</span>
                <span><?php echo htmlspecialchars($booking['service_type']); ?></span>
            </div>
            <div class="detail-row">
                <span>Event Date</span>
                <span><?php echo date('M d, Y', strtotime($booking['event_date'])); ?></span>
            </div>
            <div class="detail-row">
                <span>Amount Paid</span>
                <span style="color: #28a745;">₦<?php echo number_format($booking['price'], 2); ?></span>
            </div>
        </div>
        <?php endif; ?>

        <div class="reference">Ref: <?php echo htmlspecialchars($reference); ?></div>
        <p style="font-size: 13px; color: #6c757d;">A confirmation email has been sent to your email address.</p>
        <a href="index.php" class="btn btn-primary"><i class="fas fa-home"></i> Back to Home</a>

        <?php elseif ($status === 'failed'): ?>
        <div class="status-icon failed">
            <i class="fas fa-times"></i>
        </div>
        <h2>Payment Failed</h2>
        <p>Unfortunately, your payment could not be processed. Please try again or contact us for assistance.</p>

        <?php if ($booking): ?>
        <div class="booking-details">
            <h4><i class="fas fa-info-circle"></i> Booking Information</h4>
            <div class="detail-row">
                <span>Reference</span>
                <span><?php echo htmlspecialchars($reference); ?></span>
            </div>
            <div class="detail-row">
                <span>Service</span>
                <span><?php echo htmlspecialchars($booking['service_type']); ?></span>
            </div>
            <div class="detail-row">
                <span>Amount</span>
                <span>₦<?php echo number_format($booking['price'], 2); ?></span>
            </div>
        </div>
        <?php endif; ?>

        <a href="index.php#booking" class="btn btn-primary"><i class="fas fa-redo"></i> Try Again</a>
        <a href="index.php#contact" class="btn btn-outline"><i class="fas fa-envelope"></i> Contact Us</a>

        <?php else: ?>
        <div class="status-icon pending">
            <i class="fas fa-clock"></i>
        </div>
        <h2>Payment Pending</h2>
        <p>Your payment is being processed. Please wait a moment and check your email for updates.</p>
        <a href="index.php" class="btn btn-primary"><i class="fas fa-home"></i> Back to Home</a>
        <?php endif; ?>
    </div>
</body>
</html>
