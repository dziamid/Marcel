<?php foreach ($items as $index => $item): ?>
<tr>
  <td class="index"><?php echo $index + 1 ?></td>
  <td class='name'><?php echo $item->getMenuItem()->getName() ?></td>
  <td class='price'><?php echo $item->getMenuItem()->getPrice() ?></td>
  <td class='quantity'><?php echo $item->getQuantity() ?></td>
  <td class='total'><?php echo $item->getTotal() ?></td>
  <td class="tools">
      <a class="unselect" href="<?php echo url_for('item_unselect', $item) ?>"><?php echo image_tag('delete_24.png') ?></a>
      <a class="add" href="<?php echo url_for('item_add', $item) ?>"><?php echo image_tag('add_24.png') ?></a>
  </td>
</tr>
<?php endforeach; ?>