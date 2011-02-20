<?php if ($menu_item->getDiscount() > 0): ?>
  <?php echo sprintf("%s%%", $menu_item->getDiscount()) ?>
<?php endif; ?>