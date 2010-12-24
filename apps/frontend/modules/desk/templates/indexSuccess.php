<h1>Столы</h1>
<ul class="desks">
<?php foreach ($desks as $desk): ?>
  <li><?php echo link_to($desk->getNumber(),'desk_show',$desk) ?></li>
<?php endforeach; ?>

  <a href="<?php echo url_for('desk_new') ?>">New</a>
