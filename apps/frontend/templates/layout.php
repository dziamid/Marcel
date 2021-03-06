<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title><?php include_slot('title', 'Marceille') ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

  </head>
  <body>
    <div id="container">

      <div id="mainmenu">
        <ul class="stick_right">

        </ul>
        <?php include_component('home', 'menu') ?>

      </div>

      <div id="content">
        <div class="content">
          <?php if (has_slot('caption')): ?>
            <h1><?php include_slot('caption') ?></h1>
          <?php endif; ?>

          <?php echo $sf_content ?>
        </div>
      </div>

      <div id="footer">
        <div class="content">
          
        </div>
      </div>

    </div>
  </body>
</html>