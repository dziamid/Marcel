  <table>
    <thead>
      <tr>
        <th class='index'></th>
        <th class='name'>Название блюда</th>
        <th class='price'>Цена</th>
        <th class='quantity'>К-во</th>
        <th class='total'>Сумма</th>
        <th class='tools'></th>
      </tr>
    </thead>
  </table>
  <?php if (count($bill->getItemsByType(1))): ?>
  Кухня:
  <table>
    <tbody>
      <?php include_partial('bill/items', array('items'=>$bill->getItemsByType(1))) ?>
    </tbody>
  </table>
  <?php endif; ?>
  <?php if (count($bill->getItemsByType(2))): ?>
  Бар:
  <table>
    <tbody>
      <?php include_partial('bill/items', array('items'=>$bill->getItemsByType(2))) ?>
    </tbody>
  </table>
  <?php endif; ?>
  <div class='bill_total'>Всего: <?php echo $bill->getTotal() ?></div>