<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="payment.js"></script>
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h3 class="text-center">BoomBet Pay</h3>
          </div>
          <div class="card-body">
            <form id="paymentForm">
              <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" class="form-control" id="first-name" placeholder="Enter your first name" required
                  autocomplete="">
              </div>
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" class="form-control" id="last-name" placeholder="Enter your last name" required
                  autocomplete="">
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-primary" id="submitPaymentButton">Pay Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://js.paystack.co/v1/inline.js"></script>
</body>

</html>