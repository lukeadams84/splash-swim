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
          <?php foreach ($courses['classevents'] as $course) { ?>
            <?php
              $dayofweek = date('l', strtotime($course['classdate']));
              $timeofday  = date('H:i', strtotime($course['time']));
              $spaces = $course['spaces'] - count($course['coursegroup']['students']);
              if($spaces > 0) {
             ?>
            <option value="<?php echo $course['coursegroup_id']; ?>"><?php echo $timeofday . ' ' . $dayofweek . ' - ' . $spaces . ' spaces'; ?></option>

          <?php } } ?>
        </select>
      </div>

      <?php foreach ($courses['classevents'] as $course) { ?>

      <div id="<?php echo $course['coursegroup_id']; ?>" name="details" style="display: none;">
        <label>Course Details</label>
        <ul>
          <li>Start date: <?php echo date('d-m-Y', strtotime($course['classdate'])); ?></li>
          <li>Venue: <?php echo $course['venue']['name']; ?></li>
          <li>Time: <?php echo date('H:i', strtotime($course['time'])); ?></li>
          <li>Class length: <?php echo $course['duration'] . ' mins'; ?></li>
        </ul>
      </div>
      <?php } ?>
      <input type="hidden" id="chosenstudent" name="chosenstudent">
      <input type="hidden" id="chosencourse" name="chosencourse">

      <div class="form-group">
        <label for="amount">
            <span class="input-label">Price</span>
            <p><?php echo $this->Number->currency($courses['price'], 'GBP'); ?></p>
            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="hidden" value="<?php echo $courses['price'];?>" readonly>
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
      selector: '#bt-dropin',
      card: {
        cvv: true
      }

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
<script>

  function updateStudent(elem) {
    document.getElementById("chosenstudent").value = elem.value;
  }

  function updateCourse(elem) {
    var x = document.getElementsByName("details");
    var i;
    for (i =0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById("chosencourse").value = elem.value;
    document.getElementById(elem.value).style.display = "block";
  }

</script>
