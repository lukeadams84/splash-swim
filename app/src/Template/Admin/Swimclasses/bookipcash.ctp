<section class="content">

  <div class="row">
    <form method="post" id="payment-form" action="/admin/transactions/cashpayment">
    <div class="col-md-6">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Book an inprogress course</h3>
        </div>

  <div class="box-body">
    <section>


      <div class="form-group">
        <label>Student</label>
        <select class="form-control" id="studentselect" onchange="updateStudent(this)">
          <option value="">---Please Select---</option>
          <?php foreach ($students as $student) { ?>
            <option value="<?php echo $student['id']; ?>"><?php echo $student['firstname'] . ' ' . $student['lastname']; ?></option>

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
      <input type="hidden" id="chosencourse" name="chosencourse">

      <div class="form-group">
        <label for="amount">
            <span class="input-label">Price</span>

            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="text" value="<?php echo $courses['price'];?>" readonly>
            </div>
        </label>
      </div>
      <div class="form-group">
        <label for="firstname">
            <span class="input-label">Firstname</span>
            <div class="input-wrapper amount-wrapper">
                <input id="firstname" name="firstname" />
            </div>
        </label>
        <label for="surname">
            <span class="input-label">Surname</span>
            <div class="input-wrapper amount-wrapper">
                <input id="surname" name="surname" />
            </div>
        </label>

      </div>
      <div class="form-group">
        <label for="address1">
            <span class="input-label">Address Line 1</span>
            <div class="input-wrapper amount-wrapper">
                <input id="address1" name="address1" />
            </div>
        </label>
        <label for="address2">
            <span class="input-label">Address Line 2</span>
            <div class="input-wrapper amount-wrapper">
                <input id="address2" name="address2" />
            </div>
        </label>
        <label for="town">
            <span class="input-label">Town</span>
            <div class="input-wrapper amount-wrapper">
                <input id="town" name="town" />
            </div>
        </label>
      </div>

      <div class="form-group">
        <label for="county">
            <span class="input-label">County</span>
            <div class="input-wrapper amount-wrapper">
                <input id="county" name="county" />
            </div>
        </label>
        <label for="postcode">
            <span class="input-label">Post Code</span>
            <div class="input-wrapper amount-wrapper">
                <input id="postcode" name="postcode" />
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
    </div>

    <button class="button" type="submit"><span>Checkout</span></button>
  </div>
</div>
</div>


</form>
</div>
</section>


<script>

  function updateStudent(elem) {
    document.getElementById("chosenstudent").value = elem.value;
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
  }

</script>
