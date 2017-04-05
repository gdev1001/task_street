<form id="checkout" method="post" action="/checkout">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">                  
  <div id="payment-form"></div>
  <input type="submit" value="Pay $10">
</form>

<script src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
<script>
// We generated a client token for you so you can test out this code
// immediately. In a production-ready integration, you will need to
// generate a client token on your server (see section below).
var clientToken = "<?php echo $gateway->getClientToken() ?>";

braintree.setup(clientToken, "dropin", {
  container: "payment-form"
});
</script>