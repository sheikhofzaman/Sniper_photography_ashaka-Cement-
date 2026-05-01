<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

$message = '';
$error = '';

// Handle status update
if (isset($_GET['status']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status'];
    $validStatuses = ['pending', 'approved', 'completed', 'cancelled'];

    if (in_array($status, $validStatuses)) {
        $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        if ($stmt->execute()) {
            $message = 'Booking status updated successfully';
        } else {
            $error = 'Failed to update status';
        }
        $stmt->close();
    }
}

// Handle payment status update
if (isset($_GET['payment_status']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $paymentStatus = $_GET['payment_status'];
    $validPaymentStatuses = ['unpaid', 'paid', 'refunded', 'failed'];

    if (in_array($paymentStatus, $validPaymentStatuses)) {
        $stmt = $conn->prepare("UPDATE bookings SET payment_status = ? WHERE id = ?");
        $stmt->bind_param("si", $paymentStatus, $id);
        if ($stmt->execute()) {
            $message = 'Payment status updated successfully';
        } else {
            $error = 'Failed to update payment status';
        }
        $stmt->close();
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = 'Booking deleted successfully';
    } else {
        $error = 'Failed to delete booking';
    }
    $stmt->close();
}

// Get all bookings with payment info
$bookings = $conn->query("SELECT * FROM bookings ORDER BY created_at DESC");

$pageTitle = 'Bookings';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | Sniper Photography Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <div class="logo-icon"><i class="fas fa-camera"></i></div>
                <h3>Sniper <span>Photo</span></h3>
            </div>
            <ul class="sidebar-menu">
                <li><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span class="menu-text">Dashboard</span></a></li>
                <li><a href="bookings.php" class="active"><i class="fas fa-calendar-check"></i> <span class="menu-text">Bookings</span></a></li>
                <li><a href="gallery.php"><i class="fas fa-images"></i> <span class="menu-text">Gallery</span></a></li>
                <li><a href="services.php"><i class="fas fa-concierge-bell"></i> <span class="menu-text">Services</span></a></li>
                <li><a href="testimonials.php"><i class="fas fa-star"></i> <span class="menu-text">Testimonials</span></a></li>
                <li><a href="messages.php"><i class="fas fa-envelope"></i> <span class="menu-text">Messages</span></a></li>
                <li><a href="settings.php"><i class="fas fa-cog"></i> <span class="menu-text">Settings</span></a></li>
            </ul>
            <div class="sidebar-divider"></div>
            <ul class="sidebar-menu">
                <li><a href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> <span class="menu-text">View Website</span></a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span class="menu-text">Logout</span></a></li>
            </ul>
            <div class="sidebar-user">
                <div class="user-avatar"><?php echo strtoupper(substr($_SESSION['full_name'], 0, 1)); ?></div>
                <div class="user-info">
                    <h4><?php echo htmlspecialchars($_SESSION['full_name']); ?></h4>
                    <p><?php echo ucfirst($_SESSION['role']); ?></p>
                </div>
            </div>
        </aside>

        <main class="admin-main">
            <div class="admin-topbar">
                <div class="topbar-left">
                    <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>
                    <div class="breadcrumb">
                        <a href="index.php">Admin</a>
                        <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                        <span>Bookings</span>
                    </div>
                </div>
            </div>

            <div class="admin-content">
                <div class="page-header">
                    <h2>Manage Bookings</h2>
                    <p>View and manage all client bookings with payment status</p>
                </div>

                <?php if ($message): ?>
                <div class="alert success" style="background: rgba(40, 167, 69, 0.1); border: 1px solid #28a745; color: #28a745; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                    <i class="fas fa-check-circle"></i> <?php echo $message; ?>
                </div>
                <?php endif; ?>

                <?php if ($error): ?>
                <div class="alert error" style="background: rgba(220, 53, 69, 0.1); border: 1px solid #dc3545; color: #dc3545; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
                <?php endif; ?>

                <div class="table-card">
                    <div class="table-header">
                        <h3>All Bookings</h3>
                        <input type="text" class="table-search" data-table="bookingsTable" placeholder="Search bookings..." style="padding: 8px 15px; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 8px; color: #212529;">
                    </div>
                    <div style="overflow-x: auto;">
                        <table class="data-table" id="bookingsTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Info</th>
                                    <th>Service</th>
                                    <th>Event Date</th>
                                    <th>Amount</th>
                                    <th>Booking Status</th>
                                    <th>Payment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($booking = $bookings->fetch_assoc()): ?>
                                <tr>
                                    <td>#<?php echo $booking['id']; ?></td>
                                    <td>
                                        <strong><?php echo htmlspecialchars($booking['client_name']); ?></strong><br>
                                        <small style="color: #6c757d;"><?php echo htmlspecialchars($booking['client_email']); ?></small><br>
                                        <small style="color: #6c757d;"><?php echo htmlspecialchars($booking['client_phone']); ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars($booking['service_type']); ?></td>
                                    <td>
                                        <?php echo date('M d, Y', strtotime($booking['event_date'])); ?><br>
                                        <small style="color: #6c757d;"><?php echo $booking['event_time'] ? date('h:i A', strtotime($booking['event_time'])) : 'N/A'; ?></small>
                                    </td>
                                    <td style="font-weight: 700; color: #D4AF37;">
                                        ₦<?php echo number_format($booking['price'], 2); ?>
                                    </td>
                                    <td>
                                        <select class="status-select" data-id="<?php echo $booking['id']; ?>" data-type="booking" style="padding: 5px 10px; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 5px; color: #212529; font-size: 12px;">
                                            <option value="pending" <?php echo $booking['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="approved" <?php echo $booking['status'] == 'approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="completed" <?php echo $booking['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                            <option value="cancelled" <?php echo $booking['status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php 
                                        $paymentClass = '';
                                        $paymentLabel = '';
                                        switch($booking['payment_status']) {
                                            case 'paid': 
                                                $paymentClass = 'approved'; 
                                                $paymentLabel = 'Paid';
                                                break;
                                            case 'unpaid': 
                                                $paymentClass = 'pending'; 
                                                $paymentLabel = 'Unpaid';
                                                break;
                                            case 'failed': 
                                                $paymentClass = 'cancelled'; 
                                                $paymentLabel = 'Failed';
                                                break;
                                            case 'refunded': 
                                                $paymentClass = 'cancelled'; 
                                                $paymentLabel = 'Refunded';
                                                break;
                                            default: 
                                                $paymentClass = 'pending'; 
                                                $paymentLabel = 'Unpaid';
                                        }
                                        ?>
                                        <span class="status <?php echo $paymentClass; ?>">
                                            <i class="fas fa-<?php echo $booking['payment_status'] == 'paid' ? 'check' : 'clock'; ?>"></i> 
                                            <?php echo $paymentLabel; ?>
                                        </span>
                                        <?php if($booking['payment_reference']): ?>
                                        <br><small style="color: #6c757d; font-size: 11px;"><?php echo $booking['payment_reference']; ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="action-btn view" onclick="viewBooking(<?php echo $booking['id']; ?>)" title="View Details"><i class="fas fa-eye"></i></button>
                                        <a href="bookings.php?delete=<?php echo $booking['id']; ?>" class="action-btn delete delete-btn" title="Delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Booking Details Modal -->
    <div id="bookingModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 2000; justify-content: center; align-items: center;">
        <div style="background: #ffffff; border-radius: 20px; padding: 40px; max-width: 600px; width: 90%; max-height: 80vh; overflow-y: auto; border: 1px solid #e9ecef;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h3 style="color: #212529;">Booking Details</h3>
                <button onclick="closeModal()" style="background: none; border: none; color: #212529; font-size: 24px; cursor: pointer;"><i class="fas fa-times"></i></button>
            </div>
            <div id="bookingDetails"></div>
        </div>
    </div>

    <script src="../assets/js/admin.js"></script>
    <script>
        function viewBooking(id) {
            fetch('api/get-booking.php?id=' + id)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const b = data.booking;
                        const paymentStatusColor = b.payment_status === 'paid' ? '#28a745' : b.payment_status === 'unpaid' ? '#ffc107' : '#dc3545';
                        document.getElementById('bookingDetails').innerHTML = `
                            <div style="display: grid; gap: 15px;">
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Client Name</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: #212529;">${b.client_name}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Email</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: #212529;">${b.client_email}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Phone</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: #212529;">${b.client_phone}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Service</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: #212529;">${b.service_type}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Event Date & Time</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: #212529;">${b.event_date} ${b.event_time || ''}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Location</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: #212529;">${b.location || 'N/A'}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Message</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: #212529;">${b.message || 'No message'}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Amount</label>
                                    <p style="font-size: 20px; margin-top: 5px; color: #D4AF37; font-weight: 700;">₦${parseFloat(b.price).toLocaleString()}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Payment Status</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: ${paymentStatusColor}; text-transform: uppercase; font-weight: 700;">${b.payment_status}</p>
                                </div>
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Booking Status</label>
                                    <p style="font-size: 16px; margin-top: 5px; color: ${b.status === 'completed' ? '#28a745' : b.status === 'pending' ? '#ffc107' : b.status === 'approved' ? '#17a2b8' : '#dc3545'}; text-transform: uppercase; font-weight: 700;">${b.status}</p>
                                </div>
                                ${b.payment_reference ? `
                                <div style="padding: 15px; background: #f8f9fa; border-radius: 10px;">
                                    <label style="color: #6c757d; font-size: 12px;">Payment Reference</label>
                                    <p style="font-size: 14px; margin-top: 5px; color: #212529; font-family: monospace;">${b.payment_reference}</p>
                                </div>
                                ` : ''}
                            </div>
                        `;
                        document.getElementById('bookingModal').style.display = 'flex';
                    }
                });
        }

        function closeModal() {
            document.getElementById('bookingModal').style.display = 'none';
        }
    </script>
</body>
</html>
