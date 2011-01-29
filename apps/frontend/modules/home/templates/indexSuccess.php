<h1>Вход</h1>

<?php if (!$sf_user->isAuthenticated()): ?>
  <?php include_component('sfGuardAuth', 'signin_form') ?>
<?php else: ?>
  <p> Здравствуйте, <?php echo $sf_user->getUsername() ?></p>
  <p><?php echo link_to('Выход', '@sf_guard_signout') ?></p>
<?php endif; ?>