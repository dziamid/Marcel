<?php if (sfConfig::get('app_use_ajax',false)): ?>
  <?php use_javascript('bill.js') ?>
<?php endif; ?>
<table class="bill">
  <thead>
    <tr>
      <th class='name'>Наименование</th>
      <th class='price'>Цена</th>
      <th class='quantity'>Кол-во</th>
      <th class='total'>Всего</th>
      <th class='delete'></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan='4' class='quantity'>Всего: <?php echo $bill->getTotal() ?></td>
      <td class='delete'></td>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ($bill->getItems() as $item): ?>
    <tr>
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
  </tbody>
</table>
