<?php foreach ($items as $index => $item): ?>
<tr>
  <td class="index"><?php echo $index + 1 ?></td>
  <td class='name'>
    <?php if ($item->getBill()->getWithDiscount() && $item->getMenuItem()->getDiscount()): ?>
      <?php echo sprintf('%s (-%s%%)', $item->getMenuItem()->getName(), $item->getMenuItem()->getDiscount()) ?>
    <?php else: ?>
      <?php echo $item->getMenuItem()->getName() ?>      
    <?php endif; ?>
  </td>
  <td class='price'><?php echo $item->getPrice() ?></td>
  <td class='quantity'>
    <a class="set-quantity" href="<?php echo url_for('item_updateQuantity', $item) ?>"><?php echo $item->getQuantity() ?></a>
  </td>
  <td class='total'><?php echo $item->getTotal() ?></td>
  <td class="tools">
      <a class="unselect" href="<?php echo url_for('item_unselect', $item) ?>"><?php echo image_tag('delete_24.png') ?></a>
      <a class="add" href="<?php echo url_for('item_add', $item) ?>"><?php echo image_tag('add_24.png') ?></a>
  </td>
</tr>
<?php endforeach; ?>