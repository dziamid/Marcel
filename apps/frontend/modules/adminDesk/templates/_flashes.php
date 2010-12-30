<?php if ($sf_user->hasFlash('notice')): ?>
  <?php slot('flash_notice') ?>
  <div class="flash_notice"><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
  <?php end_slot('flash_notice'); ?>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <?php slot('flash_error') ?>
  <div class="flash_error"><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
  <?php end_slot('flash_error'); ?>
<?php endif; ?>
