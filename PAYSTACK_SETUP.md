# PAYSTACK PAYMENT SETUP GUIDE
# Sniper Photography - Abubakar Musa

---

## 🔑 STEP 1: Get Your Paystack Keys

1. Go to https://dashboard.paystack.com
2. Create an account or log in
3. Navigate to **Settings → API Keys & Webhooks**
4. Copy your:
   - **Public Key** (starts with pk_test_ or pk_live_)
   - **Secret Key** (starts with sk_test_ or sk_live_)

---

## ⚙️ STEP 2: Update Database with Your Keys

Run this SQL query in phpMyAdmin or MySQL:

```sql
UPDATE paystack_settings 
SET public_key = 'pk_test_YOUR_PUBLIC_KEY_HERE',
    secret_key = 'sk_test_YOUR_SECRET_KEY_HERE',
    is_live = FALSE
WHERE id = 1;
```

For production (when ready to accept real payments):
```sql
UPDATE paystack_settings 
SET public_key = 'pk_live_YOUR_LIVE_PUBLIC_KEY',
    secret_key = 'sk_live_YOUR_LIVE_SECRET_KEY',
    is_live = TRUE
WHERE id = 1;
```

---

## 🧪 TESTING PAYMENTS

Use these test card details:

| Card Number | CVV | Expiry | PIN | OTP |
|-------------|-----|--------|-----|-----|
| 4084084084084081 | 408 | 12/25 | 0000 | 123456 |
| 506066506066506066 | 408 | 12/25 | 0000 | 123456 |

For bank transfer test: Select "Pay with Bank" and use any bank

---

## 📋 PAYMENT FLOW

1. Customer fills booking form → clicks "Proceed to Payment"
2. Booking is saved with status "pending" and payment "unpaid"
3. Customer sees booking summary with Pay Now button
4. Clicking Pay Now initializes Paystack transaction
5. Customer is redirected to Paystack secure checkout
6. After payment, customer returns to payment-status.php
7. Payment is verified and booking updated to "paid"
8. Admin sees payment status in dashboard

---

## 🔒 SECURITY NOTES

- NEVER commit your secret keys to Git
- Use test keys during development
- Switch to live keys only for production
- Paystack handles PCI compliance - no card data touches your server
- All transactions are over HTTPS

---

## 📞 PAYSTACK SUPPORT

- Email: support@paystack.com
- Docs: https://paystack.com/docs
- Status: https://status.paystack.com
