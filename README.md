Modulecommerce_nganluong
==================

Commerce payment method for NganLuong (https://www.nganluong.vn)

#Features
1. Pay a order via nganluong.vn.
2. Create payment transaction if payment is success.
3. Go back to previous pane if there are errors with the payment.

#Installation
1. Download class NL_Checkout from https://www.nganluong.vn/data/document/NganLuong_PHP.rar
2. Extract this file and copy file nganluong.php to  folder includes/ (the path will be <module folder>commerce_nganluong/includes/nganluong.php).
3. Edit file nganluong.php to match your NganLuong account
   - Change $nganluong_url. Use 'https://www.nganluong.vn/checkout.php' for your live account. 
     Use 'http://beta.nganluong.vn/checkout.php' for your sandbox account.
   - Change $merchant_site_code: this code is provided by Nganluong.vn
   - Change $secure_pass: this pass is provided by Nganluong.vn
   - Change other variables to match your requirement.
4. Enable this module as usual.
5. Go to URL admin/commerce/config/payment-methods to config for this payment method. 
   Enter NganLuong receiver e-mail address and press Save button.
6. Check out and select NganLuong payment method.
7. Done!
