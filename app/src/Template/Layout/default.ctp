<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Splash Swim Schools';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title>
      <?= $cakeDescription ?>:
      <?= $this->fetch('title') ?>
    </title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->

        <?= $this->Html->css('https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css') ?>
    <!--<![endif]-->

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">


        <!--[if gt IE 8]><!-->

            <?= $this->Html->css('marketing.css') ?>
        <!--<![endif]-->

  </head>

  <body>

    <?php if($this->request->here != '/') { echo $this->element('home/nav2'); } ?>




    <?php if ($this->request->here == '/pages/index') { ?>
    <div class="splash-container">
        <div class="splash">
            <h1 class="splash-head"></h1>
            <p class="splash-subhead">

            </p>
            <p>
                <a href="#1" class="pure-button pure-button">Get Started</a>
            </p>
        </div>
    </div>
    <div class="content-wrapper-home">
  <?php } ?>



    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>



</div>
<?php echo $this->element('home/footer'); ?>

  </body>
</html>
