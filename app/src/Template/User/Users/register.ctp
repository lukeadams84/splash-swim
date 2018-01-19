
<?php $this->layout = 'UserLTE.register'; ?>
<style>
.modal-window {
  position: fixed;
  background-color: rgba(255, 255, 255, 0.15);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow-y: auto;
  z-index: 999;
  opacity: 0;
  pointer-events: none;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

.modal-window:target {
  opacity: 1;
  pointer-events: auto;
}

.modal-window>div {
  width: 80%;
  position: relative;
  margin: 5% auto;
  padding: 2rem;
  background: #fff;
  color: #444;
}

.modal-window header {
  font-weight: bold;
}

.modal-close {
  color: #aaa;
  line-height: 50px;
  font-size: 80%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
}

.modal-close:hover {
  color: #000;
}

.modal-window h1 {
  font-size: 150%;
  margin: 0 0 15px;
}
</style>



<?php echo $this->Form->create($user, ['url' => ['prefix' => 'user', 'controller' => 'users', 'action' => 'register']]);

    echo $this->Form->input('email', array('class' => 'form-control', 'type' => 'text', 'required' => true ));
    echo $this->Form->input('firstname', array('class' => 'form-control', 'type' => 'text', 'required' => true ));
    echo $this->Form->input('lastname', array('class' => 'form-control', 'type' => 'text', 'required' => true ));
    echo $this->Form->input('password', array('class' => 'form-control', 'type' => 'password', 'required' => true ));
    echo $this->Form->input('password_confirm', array('class' => 'form-control', 'type' => 'password', 'required' => true ));
    echo $this->Form->hidden('role', array('class' => 'form-control', 'type' => 'text', 'value' => 'parent' ));?>
    <br>
    <?php
    echo $this->Form->checkbox('Terms', array('class' => 'form-control', 'type' => 'checkbox', 'required' => true ));
    echo '&nbsp;&nbsp;I accept the <a href="#open-modal">terms and conditions</a>';
     ?>
    <br>
    <br>

    <?php echo $this->Form->submit('Register', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
    <br>
    <a href="/user/users/login" class="btn btn-primary btn-block btn-flat"><?php echo __('Already a member') ?></a>

    <div id="open-modal" class="modal-window">
      <div>
        <a href="#modal-close" title="Close" class="modal-close">Close</a>
        <h1>General Terms and Conditions</h1>
        <div><p>I understand it is my responsibility to keep SPLASH SWIM SCHOOLS informed of any changes in contact details or any changes in health issues that may affect me / my child at any SPLASH SWIM SCHOOLS classes.</p>
        <p>I understand and agree that SPLASH SWIM SCHOOLS representatives may aid me / my child in and out of the pool and during classes.</p>
        <p>I give consent that me or my child may receive first aid attention at or during class if required.</p>
        <p>No photography or video footage is allowed before, during or after swim class at SPLASH SWIM SCHOOLS venues.</p>
        <p>I consent to SPLASH SWIM SCHOOLS, or appointed persons taking photographs or video footage at class which may be used for SPLASH SWIM SCHOOLS promotions, including the website of SPLASH SWIM SCHOOLS.</p>
        <p>Any medical condition, syndrome or issue that SPLASH SWIM SCHOOLS should or need to be made aware of, must be declared at the time of registration in notes and if so, may be conditional to bookings being accepted.</p>
        <p>Classes, Places and Private Lessons in each upcoming term are all subject to commercial feasibility of paid subscriptions and registration to each session offered in each upcoming term. If insufficient registrations transpire we reserve the right to cancel and offer full refunds for each registrant of any cancelled session.</p>
        <p>Registration must be made via website, any approved bookings made, and attendance to class or private lessons confirms T&C’s have been read and agreed.</p>
        <p>I agree that my child/children shall never be left unattended at any time.</p>
        <p>Bookings are made for a Course / Term basis and paid for in advance, payments are not refundable.</p>
        <p>I agree to pay for all sessions that I / my child attends and for any sessions that are missed due to illness or for any other reason.</p>
        <p>Classes / Term is booked on a Block booking basis, attendance is at your discretion, no “make up” or alternative sessions will be offered for any session not attended.</p>
        <p>I agree to pay in advance for the full course of lessons in one lump sum.  Or If you are paying in 2 instalments, your 2nd fee will be due before the halfway point of the block. Example on a 12 week block the 2nd payment is due at week 5.  Late payments will incur an additional fee of £5/Eur5 per child for each week outstanding.</p>

        <p>Parents and children must not leave the premises while their children are taking lessons.  Use of a walkie-talkie system so if a parent is needed on the pool deck, you will be contacted via reception.</p>
        <p>Parents & guardians are responsible for collecting their child on time from the pool deck after the class ends.  Please supervise your children before at all times while in each venue.</p>
        <p>Parents and guardians must not stand on the poolside while their child is taking part in the lessons as it may be very distracting for the children and class.  In our City Hotel venue, as reception is limited to space we must ask all parents to move downstairs to the Foyer area once their child is settled.</p>
        <p>If you are unable to make a class for whatever reason, at least 24 hours’ notice must be given, otherwise the class will be lost, outside of this time we will try to accommodate you with an alternative class, if this time is not suitable then it will be forfeited.  Missed classes cannot be transferred to other siblings, future blocks or refunds given in lieu.</p>
        <p>Please do not attend swimming if you or your child have been unwell with sickness or diarrhoea in the last 48hrs.</p>

        <h5>Splash Swim Schools</h5>
        <a href="#modal-close" title="Close" class="modal-close">Close</a>
      </div>
        </div>
    </div>


<?php echo $this->element('gtag'); ?>
