<?php foreach ($items as $index => $item): ?>
<tr>
  <td class="index"><?php echo $index + 1 ?></td>
  <td class='name'><?php echo $item->getMenuItem()->getName() ?></td>
  <td class='price'><?php echo $item->getMenuItem()->getPrice() ?></td>
  <td class='quantity'><?php echo $item->getQuantity() ?></td>
  <td class='total'><?php echo $item->getTotal() ?></td>
  <td class="delete">
    <?php if (sfConfig::get('app_use_ajax', false)): ?>
      <?php echo link_to (image_tag('delete.png'), 'item_unselect', $item) ?>
    <?php else: ?>
      <?php echo link_to (image_tag('delete.png'), 'item_unselect', $item, array('method'=>'post')) ?>
    <?php endif; ?>
  </td>
</tr>
<?php endforeach; ?>