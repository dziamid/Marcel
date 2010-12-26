
<?php if ($open_bill = $desk->getOpenBill()): ?>

<div id='openbill' class='ui-widget-content'>
  <h1>Стол №<?php echo $desk->getNumber() ?>, счет #<?php echo $open_bill->getNumber() ?></h1>
  <?php include_partial('bill/show',array('bill'=>$desk->getOpenBill())) ?>
</div>
<?php endif; ?>

<div id='menu'>
<?php include_component('menu_item','list', array(
  'open_bill_id'=> $open_bill->getId()
)) ?>
</div>
<h1>Счета</h1>
<ul>
  <?php foreach ($desk->getBills() as $bill): ?>
    <li><a href="<?php echo url_for('bill_show', $bill) ?>">Счёт №<?php echo $bill->getNumber() ?></a></li>
  <?php endforeach; ?>
</ul>