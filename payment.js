function handlePayment() {
  let handler = PaystackPop.setup({
    key: "pk_live_0665a9cd5586c4be95b13fbd5ee0938cc9801ab6", // Replace with your public key
    email: "boombet@gh.com",
    amount: 0.1 * 100,
    currency: "GHS",
    ref: "" + Math.floor(Math.random() * 1000000000 + 1),
    onClose: function () {
      window.location = "BoomBet/payment.php?transaction=cancel";
      alert("Transaction Cancelled.");
    },
    callback: function (response) {
      let message = "Payment Complete Reference: " + response.reference;
      alert(message);
      window.location =
        "https://BoomBet/verify_transaction.php?reference=" +
        response.reference;
    },
    callback: function (response) {
      if (response.status === "success") {
        setCookie("paymentStatus", "completed", 1);
        redirectToPremiumPage();
      } else {
        setCookie("paymentStatus", "incomplete", 1);
        alert("Payment failed.");
      }
    },
  });

  handler.openIframe();
}

function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    const date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}

function redirectToPremiumPage() {
  if (getCookie("paymentStatus") === "completed") {
    window.location.href = "premium.php";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const submitButton = document.getElementById("submitPaymentButton");

  if (submitButton) {
    submitButton.addEventListener("click", handlePayment);
  }
});
