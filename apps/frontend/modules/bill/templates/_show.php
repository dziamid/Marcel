<?php if (sfConfig::get('app_use_ajax',false)): ?>
  <?php use_javascript('bill.js') ?>
<?php endif; ?>
<table class="bill">
  <thead>
    <tr>
      <th class='index'>№ п/п</th>
      <th class='name'>Наименование продукции</th>
      <th class='quantity'>Кол-во (единиц)</th>
      <th class='price'>Цена за 1 единицу продукции</th>
      <th class='total'>Стоимость продукции (рублей)</th>
      <th class='delete'></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan='5' class='quantity'>Сумма (рублей): <?php echo $bill->getTotal() ?></td>
      <td class='delete'></td>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ($bill->getItems() as $index => $item): ?>
    <tr>
      <td class="index"><?php echo $index + 1 ?></td>
      <td class='name'><?php echo $item->getMenuItem()->getName() ?></td>
      <td class='quantity'><?php echo $item->getQuantity() ?></td>
      <td class='price'><?php echo $item->getMenuItem()->getPrice() ?></td>
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
