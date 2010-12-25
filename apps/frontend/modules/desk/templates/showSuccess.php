<h1>Стол №<?php echo $desk->getNumber() ?></h1>

<a href="<?php echo url_for('desk_edit', $desk) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('desk') ?>">List</a>


<?php if ($open_bill = $desk->getOpenBill()): ?>
  <h1>Текущий счет #<?php echo $open_bill->getNumber() ?></h1>
  <?php include_partial('bill/show',array('bill'=>$desk->getOpenBill())) ?>
<?php endif; ?>

<h1>Меню:</h1>
<ul class="list">
  <?php include_component('menu_item','list',array('open_bill'=>$open_bill)) ?>
</ul>
<h1>Счета</h1>
<ul>
  <?php foreach ($desk->getBills() as $bill): ?>
    <li><a href="<?php echo url_for('bill_show', $bill) ?>">Счёт №<?php echo $bill->getNumber() ?></a></li>
  <?php endforeach; ?>
</ul>