<h1>Столы</h1>

<?php foreach ($desks as $desk): ?>
  <div class="desk <?php echo $desk->getOpenBill()->isNotNull() ? 'active':'' ?>"><?php echo link_to($desk->getNumber(),'desk_show',$desk) ?></div>
<?php endforeach; ?>
