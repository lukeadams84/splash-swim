<section class="content">

  <div class="row">
    <script src="https://js.stripe.com/v3/"></script>
    <form method="post" id="payment-form" action="/user/transactions/charge">
    <div class="col-md-6">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Book an in-progress course</h3>
        </div>

  <div class="box-body">
    <section>


      <div class="form-group">
        <label>Student</label>
        <select class="form-control" id="studentselect" onchange="updateStudent(this)">
          <option value="">---Please Select---</option>
          <?php foreach ($user['students'] as $student) { ?>
            <option value="<?php echo $student['id']; ?>"><?php echo $student['firstname']; ?></option>

          <?php } ?>

        </select>
      </div>
      <div class="form-group">
        <label>Course <?php echo $courses['name']; ?></label>
        <select class="form-control" id="courseselect" onchange="updateCourse(this)">
          <option value="">---Please Select---</option>
          <?php foreach ($courses['coursegroups'] as $course) { ?>
            <?php
              $dayofweek = date('l', strtotime($course['classevents']['0']['classdate']));
              $timeofday  = date('H:i', strtotime($course['classevents']['0']['time']));
              $spaces = $course['classevents']['0']['spaces'] - count($course['students']);
              if($spaces > 0) {
             ?>
            <option value="<?php echo $course['id']; ?>"><?php echo $timeofday . ' ' . $dayofweek . ' - week ' . $course['classevents']['0']['weeknum'] . ' of '. $course['classevents']['0']['length'] . ' - ' . $spaces . ' spaces'; ?></option>

          <?php } } ?>
        </select>
      </div>

      <?php foreach ($courses['coursegroups'] as $course) { ?>

        <?php
          $price = $course['price'];
          $length = $course['classevents']['0']['length'];
          $week = $course['classevents']['0']['weeknum'];

          $leftover = ($price / $length) * (($length + 1) - $week); ?>


      <div id="<?php echo $course['id']; ?>" name="details" style="display: none;">
        <label>Course Details</label>
        <ul>
          <li>Next class: <?php echo date('d-m-Y', strtotime($course['classevents']['0']['classdate'])); ?></li>
          <li>Venue: <?php echo $course['classevents']['0']['venue']['name']; ?></li>
          <li>Time: <?php echo date('H:i A', strtotime($course['classevents']['0']['time'])); ?></li>
          <li>Class length: <?php echo $course['classevents']['0']['duration'] . ' mins'; ?></li>
          <li>Course week: <?php echo $course['classevents']['0']['weeknum'] . ' of '. $course['classevents']['0']['length']; ?></li>
          <li>Price: <?php echo $this->Number->currency($leftover, 'GBP'); ?></li>
        </ul>

        <input id="<?php echo $course['id'] . 'price'; ?>" type="hidden" value="<?php echo $leftover; ?>">
      </div>
      <?php } ?>
      <input type="hidden" id="chosenstudent" name="chosenstudent">
      <input type="hidden" id="studentname" name="studentname">
      <input type="hidden" id="chosencourse" name="chosencourse">

      <div class="form-group">
        <label for="amount">
            <span class="input-label">Price</span>

            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="text" value="<?php echo $courses['price'];?>" readonly>
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
        <div class="form-group">
        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element">
          <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
      </div>
        <div class="form-group">
          <label for="amount">
              <span class="input-label">Payment amount</span>
              <input id="amount2" name="amount2" type="text" value="<?php echo $courses['price'];?>" readonly>

          </label>
        </div>

        <button class="button btn btn-block btn-primary" id="btnSubmit" disabled><span>Checkout</span></button>

  </section>
  </div>
</div>
</div>


</form>
</div>
</section>


<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_ARgAJVgJV0Qd8Dau7ROW6Tth');
var elements = stripe.elements();
// Custom Styling
var style = {
    base: {
        color: '#32325d',
        lineHeight: '24px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
// Create an instance of the card Element
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            stripeTokenHandler(result.token);
        }
    });
});
// Send Stripe Token to Server
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
// Add Stripe Token to hidden input
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
// Submit form
    form.submit();
}

  function updateStudent(elem) {
    document.getElementById("chosenstudent").value = elem.value;
    document.getElementById("studentname").value = elem.options[elem.selectedIndex].text;
  }

  function updatePrice(elem) {
    document.getElementById("amount").value = elem.value;
  }

  function updateCourse(elem) {
    var x = document.getElementsByName("details");
    var i;
    for (i =0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById("chosencourse").value = elem.value;
    document.getElementById(elem.value).style.display = "block";
    document.getElementById("amount").value = document.getElementById(elem.value + "price").value;
    document.getElementById("amount2").value = document.getElementById(elem.value + "price").value;
    document.getElementById("btnSubmit").disabled = false;
  }

</script>
