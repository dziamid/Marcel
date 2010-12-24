<?php echo $menu->render(1) ?>
<div class='submenu'>
  <ul>
  <?php if (isset($submenu) && $submenu): ?>
    <?php echo $submenu->renderChildren(0) ?>
  <?php endif; ?>
  
  <?php include_slot('submenu') ?>
  </ul>
</div>