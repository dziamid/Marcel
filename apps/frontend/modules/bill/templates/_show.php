  <table class="bill">
    <thead>
      <tr>
        <th class='index'></th>
        <th class='name'>Название блюда</th>
        <th class='price'>Цена</th>
        <th class='quantity'>К-во</th>
        <th class='total'>Сумма</th>
        <th class='delete'></th>
      </tr>
    </thead>
  </table>
  <?php if (count($kitchen_items)): ?>
  Кухня:
  <table class="bill">
    <tbody>
      <?php include_partial('bill/type', array('items'=>$kitchen_items)) ?>
    </tbody>
  </table>
  <?php endif; ?>
  <?php if (count($bar_items)): ?>
  Бар:
  <table class="bill">
    <tbody>
      <?php include_partial('bill/type', array('items'=>$bar_items)) ?>
    </tbody>
  </table>
  <?php endif; ?>
  <div class='bill_total'>Всего: <?php echo $bill->getTotal() ?></div>