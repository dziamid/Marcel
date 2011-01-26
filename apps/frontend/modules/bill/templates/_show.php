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
  <div class='total'>Сумма (рублей): <?php echo $bill->getTotal() ?></div>