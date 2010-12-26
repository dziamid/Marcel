
<div id='openbill' class='area'>
  <?php if ($openbill->isNotNull()): ?>
    <h1>Стол №<?php echo $desk->getNumber() ?>, счет #<?php echo $openbill->getNumber() ?></h1>
    <?php include_partial('bill/show',array('bill'=>$openbill)) ?>
  <?php else: ?>
    <h1>Стол №<?php echo $desk->getNumber() ?></h1>
    <?php echo link_to('Создать счёт', 'desk_open', $desk, array('method'=>'post')) ?>
  <?php endif ?>
</div>

<div id='menu'>
<?php include_component('menu_item','list', array(
  'open_bill'=> $openbill
)) ?>
</div>

<div class='area'>
  <h1>Счета</h1>
  <ul>
    <?php foreach ($desk->getBills() as $bill): ?>
      <li><a href="<?php echo url_for('bill_show', $bill) ?>">Счёт №<?php echo $bill->getNumber() ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>