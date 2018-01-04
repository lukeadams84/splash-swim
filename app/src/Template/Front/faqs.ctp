<?php echo $this->element('home/waterborder'); ?>
<h2 class="content-head is-center">FAQs</h2>
<div class="ribbon l-box-lrg pure-g">
  <div class="l-box-lrg pure-u-1 pure-u-md-1 pure-u-lg-1">
    <h3 class="content-head content-head-ribbon is-center">Index</h3>
    <?php foreach($faqs as $faq) { ?>
        <a href="#<?php echo $faq['id']; ?>" style="text-decoration:none;"><p class="content-subhead"><?php echo $faq['title']; ?></p></a>

      <?php } ?>
  </div>

</div>
<div class="content">
        <div class="pure-g">
          <div class="l-box-lrg pure-u-1 pure-u-md-1 pure-u-lg-1">
              <h3 class="content-head is-center">General</h3>
              <?php foreach($faqs as $faq) {
                if($faq['category'] == 'General') { ?>

                  <a name="<?php echo $faq['id']; ?>"><h3 class="content-subhead"><?php echo $faq['title']; ?></h3></a>
                  <p><?php echo $faq['text']; ?></p>

                <?php }
              } ?>
            </div>

            <div class="l-box-lrg pure-u-1 pure-u-md-1 pure-u-lg-1">
              <h3 class="content-head is-center">Splash Babies</h3>
              <?php foreach($faqs as $faq) {
                if($faq['category'] == 'Splash Babies') { ?>

                  <a name="<?php echo $faq['id']; ?>"><h3 class="content-subhead"><?php echo $faq['title']; ?></h3></a>
                  <p><?php echo $faq['text']; ?></p>

                <?php }
              } ?>
            </div>

          </div>

</div>
