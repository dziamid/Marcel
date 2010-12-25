
<?php foreach ($menu_items as $menu_item): ?>
  <li>
    <?php if ($open_bill): ?>    
      <?php echo link_to($menu_item->getName(), 'menu_item_select', array('sf_subject'=>$menu_item,'open_bill_id'=>$open_bill->getId()),array('method'=>'post')) ?>
    <?php else: ?>
      <?php echo $menu_item->getName() ?>
    <?php endif; ?>
  </li>
<?php endforeach; ?>

