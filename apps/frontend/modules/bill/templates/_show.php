<table class="bill">
  <thead>
    <tr>
      <th class='name'>Наименование</th>
      <th class='price'>Цена</th>
      <th class='quantity'>Кол-во</th>
      <th class='delete'></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan='3' class='quantity'>Всего: <?php echo $bill->getTotal() ?></td>
      <td class='delete'></td>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ($bill->getItems() as $item): ?>
    <tr>
      <td class='name'><?php echo $item->getMenuItem()->getName() ?></td>
      <td class='price'><?php echo $item->getMenuItem()->getPrice() ?></td>
      <td class='quantity'><?php echo $item->getQuantity() ?></td>
      <td class="delete"><?php echo link_to (image_tag('delete.png'), 'item_unselect', $item, array('method'=>'post')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
