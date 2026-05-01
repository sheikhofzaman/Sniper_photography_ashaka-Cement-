<?php
// Paystack Payment Callback
// Sniper Photography - Abubakar Musa

require_once 'includes/db.php';
require_once 'includes/payment-config.php';

$reference = isset($_GET['reference']) ? trim($_GET['reference']) : '';

if (empty($reference)) {
    header('Location: index.php?payment=failed');
    exit();
}

// Verify payment
$secretKey = getPaystackSecretKey();
$url = 'https://api.paystack.co/transaction/verify/' . $reference;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $secretKey,
    'Cache-Control: no-cache'
]);

$paystackResponse = curl_exec($ch);
curl_close($ch);

$paystackData = json_decode($paystackResponse, true);

if ($paystackData['status'] === true && $paystackData['data']['status'] === 'success') {
    $data = $paystackData['data'];

    // Update payment record
    $updatePayment = $conn->prepare("UPDATE payments SET status = 'success', gateway_response = ?, paid_at = ?, channel = ?, card_type = ?, bank = ?, last4 = ? WHERE reference = ?");
    $gatewayResponse = json_encode($data);
    $paidAt = $data['paid_at'];
    $channel = $data['channel'] ?? null;
    $cardType = $data['authorization']['card_type'] ?? null;
    $bank = $data['authorization']['bank'] ?? null;
    $last4 = $data['authorization']['last4'] ?? null;

    $updatePayment->bind_param("sssssss", $gatewayResponse, $paidAt, $channel, $cardType, $bank, $last4, $reference);
    $updatePayment->execute();
    $updatePayment->close();

    // Update booking
    $updateBooking = $conn->prepare("UPDATE bookings SET payment_status = 'paid', payment_method = ?, paid_at = ? WHERE payment_reference = ?");
    $updateBooking->bind_param("sss", $channel, $paidAt, $reference);
    $updateBooking->execute();
    $updateBooking->close();

    header('Location: index.php?payment=success&ref=' . $reference);
} else {
    $failStmt = $conn->prepare("UPDATE payments SET status = 'failed' WHERE reference = ?");
    $failStmt->bind_param("s", $reference);
    $failStmt->execute();
    $failStmt->close();

    header('Location: index.php?payment=failed&ref=' . $reference);
}

exit();
?>
