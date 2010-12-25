<table class="bill">
  <thead>
    <tr>
      <th>Наименование:</th>
      <th>Цена:</th>
      <th>Кол-во:</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bill->getItems() as $item): ?>
    <tr>
      <td><?php echo $item->getMenuItem()->getName() ?></td>
      <td><?php echo $item->getMenuItem()->getPrice() ?></td>
      <td><?php echo $item->getQuantity() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
Всего: <?php echo $bill->getTotal() ?>