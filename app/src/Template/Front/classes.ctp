
<?php echo $this->element('home/waterborder'); ?>

<?php

  $beginner = "";
  $inter = "";
  $adv = "";
  $baby = "";

  foreach($swimclasses as $swimclass) {
    if(!empty($swimclass['classevents'])) {
      switch($swimclass['name']) {
        case "Beginner":
          $beginner = $swimclass['classevents']['0']['classdate'];
          break;
        case "Intermediate":
          $inter = $swimclass['classevents']['0']['classdate'];
          break;
        case "Advanced":
          $adv = $swimclass['classevents']['0']['classdate'];
          break;
        case "Baby & Toddler":
          $baby = $swimclass['classevents']['0']['classdate'];
          break;
        default:
          break;
      }
    }
  }
?>

<h2 class="content-head is-center">Classes and Groups</h2>
<div class="pure-g">
    <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
      <p>We offer a range of classes for all abilities and for all age groups. Pricing is listed below on a course basis. The award programs fit against the class types and we advance students based on their achievements and progress.</p>
      <p>Our classes are tailored with qualified instructors and we limit the number of students in each class to ensure the appropriate attention is provided to everyone.</p>
      <p>To register a student in one of our classes, please use the button below to create an account. If you have an account already, please use the login button.</p>
      <a href="/user/users/register"><button type="button" class="pure-button">Register</button></a>
      <a href="/user/users/login"><button type="button" class="pure-button">Login</button></a>
    </div>
    <div class="l-box-lrg pure-u-1 pure-u-md-2-5">

      <img src="/img/girlholdingbreath.jpg" class="pure-img-responsive">
    </div>
</div>

<div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
            <h2 class="content-head content-head-ribbon">Splash Babies</h2>
            <p><?php if(!empty($baby)) { echo "Next course starts: " . date('d-m-Y', strtotime($baby)); } ?></p>
        </div>
        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">


            <table class="pure-table" style="width:100%;">
              <thead>
                <tr>
                  <td>Age Group</td>
                  <td>Duration</td>
                  <td>Length</td>
                  <td>Spaces</td>
                  <td>Price</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Babies</td>
                  <td>30 mins</td>
                  <td>6 weeks</td>
                  <td>12</td>
                  <td>£45</td>
                </tr>
                <tr>
                  <td>Toddlers</td>
                  <td>30 mins</td>
                  <td>6 weeks</td>
                  <td>12</td>
                  <td>£45</td>
                </tr>
              </tbody>
            </table>

        </div>
    </div>

    <div class="ribbon l-box-lrg pure-g">
      <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
          <h3 class="content-head content-head-ribbon">Splash Kids</h3>
          <p><?php if(!empty($beginner)) { echo "Next Beginner course starts: " . date('d-m-Y', strtotime($beginner)); } ?></p>
          <p><?php if(!empty($inter)) { echo "Next Intermediate course starts: " . date('d-m-Y', strtotime($inter)); } ?></p>
          <p><?php if(!empty($adv)) { echo "Next Advanced course starts: " . date('d-m-Y', strtotime($adv)); } ?></p>
      </div>
            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">
                <table class="pure-table" style="width:100%;">
                  <thead>
                    <tr>
                      <td>Level</td>
                      <td>Duration</td>
                      <td>Length</td>
                      <td>Spaces</td>
                      <td>Price</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Beginners</td>
                      <td>30 mins</td>
                      <td>12 weeks</td>
                      <td>6</td>
                      <td>£90</td>
                    </tr>
                    <tr>
                      <td>Intermediate</td>
                      <td>30 mins</td>
                      <td>12 weeks</td>
                      <td>6</td>
                      <td>£90</td>
                    </tr>
                    <tr>
                      <td>Advanced</td>
                      <td>30 mins</td>
                      <td>12 weeks</td>
                      <td>6</td>
                      <td>£90</td>
                    </tr>
                  </tbody>
                </table>
            </div>

        </div>

        <div class="ribbon l-box-lrg pure-g">
          <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
              <h3 class="content-head content-head-ribbon">Private Classes</h3>
          </div>
                <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">
                  <br>
                  <p></p>
                    <p>Private classes are available in 1:1, 2:1 and 3:1 options. Speak to an instructor or drop us an email for details <a style="color:white;" href="mailto:info@splashswimschools.co.uk">info@splashswimschools.co.uk</a></p>
                </div>

            </div>


<div class="content">

  <h2 class="content-head is-center">Register an account to get started!</h2>

  <div class="pure-g">
      <div class="l-box-lrg pure-u-1 pure-u-md-2-5">



      </div>
    </div>
</div>
