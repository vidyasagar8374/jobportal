<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
    <p>Redirecting...</p>
    <form id="redirectForm" action="{{ $postUrl }}" method="post">
        @csrf
      <input type="hidden" name="trans_id" value="{{ $paymentdetails->trans_id }}">
      <input type="hidden" name="ref_id" value="{{ $paymentdetails->ref_id }}">
      <input type="hidden" name="payment_type" value="{{ $paymentdetails->payment_type }}">
      <input type="hidden" name="amount" value="{{ $paymentdetails->amount }}">      
    </form>

    <script>
        document.getElementById('redirectForm').submit();
    </script>
</body>
</html>
