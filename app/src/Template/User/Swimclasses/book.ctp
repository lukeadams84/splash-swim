<section class="content">

  <div class="row">
    <form method="post" id="payment-form" action="/user/transactions/checkout">
    <div class="col-md-6">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Book a class</h3>
        </div>

  <div class="box-body">
    <section>

      <label>Class Details</label>
      <p></p>

      <div class="form-group">
        <label>Student</label>
        <select class="form-control">
          <?php foreach ($user['students'] as $student) {
    ?>
            <option><?php echo $student['firstname']; ?></option>

          <?php
} ?>

        </select>
      </div>
      <div class="form-group">
        <label>Course</label>
        <select class="form-control">
          <?php foreach ($coursegroup as $course) {
        ?>
            <?php if (!empty($course['classevents'])) {
            ?>
            <option><?php echo $course['swimclass']['name'] . ' - ' . $course['classevents']['0']['time'] . ' | £' . $course['swimclass']['price']; ?></option>

          <?php
        }
    } ?>

        </select>
      </div>
      <div class="form-group">
        <label for="amount">
            <span class="input-label">Amount</span>
            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="49.99">
            </div>
        </label>
      </div>

    </section>


  </div>


</div>
</div>

<div class="col-md-6">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Payment details</h3>
    </div>

    <div class="box-body">
      <section>

    <div class="bt-drop-in-wrapper">
        <div id="bt-dropin"></div>
    </div>

    <input id="nonce" name="payment_method_nonce" type="hidden" />
    <button class="button" type="submit"><span>Checkout</span></button>
  </div>
</div>
</div>


</form>
</div>
</section>


<script src="https://js.braintreegateway.com/web/dropin/1.6.1/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "<?php echo(Braintree\ClientToken::generate()); ?>";

    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin'
      //paypal: {
      //  flow: 'vault'
      //}
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();

        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Error', err);
            return;
          }

          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });

    var checkout = new Demo({
      formID: 'payment-form'
    });
</script>
