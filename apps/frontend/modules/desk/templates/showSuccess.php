<?php use_stylesheet('print.css', '', array('media'=>'print')) ?>
<?php if (sfConfig::get('app_use_ajax',false)): ?>
  <?php use_javascript('bill.js') ?>
<?php endif; ?>

<div id='openbill' class='area'>
  <?php if ($bill->isNotNull()): ?>
    <h1>CЧЁТ № <span><?php echo $bill->getNumber() ?></span></h1>
      
    <div class="header">
      <p><small>Юридическое лицо, индивидуальный предприниматель</small></p>
      <p><span><?php echo sfConfig::get('app_billheader_company') ?></span></p>
      <p><small>Торговый объект общественного питания</small>
      <p><span><?php echo sfConfig::get('app_billheader_cafe') ?></span></p>
      <h1>CЧЁТ № <span><?php echo $bill->getNumber() ?></span></h1>
      <p><small>Официант (бармен): </small> <span><?php echo sfConfig::get('app_billheader_waiter') ?></span></p>
      <p><small>Дата выдачи счёта: </small> <span><?php echo $today ?></span></p>  
    </div>
    <div id="bill_body">
      <?php include_partial('bill/show',array('bill'=>$bill, 'kitchen_items'=>$kitchen_items, 'bar_items'=>$bar_items)) ?>
    </div>
    <div class="footer">
      <p><small>Подпись официанта (бармена)</small> ______________</p>
    </div>
    <div class='tools'>
      <a href="javascript:window.print()">Распечатать счёт</a>
      <?php echo link_to('Закрыть стол', 'desk_close', $desk, array('method'=>'post')) ?>
    </div>
  <?php else: ?>
    <h1>Стол №<?php echo $desk->getNumber() ?></h1>
    <div class='tools'>
      <?php echo link_to('Открыть стол', 'desk_open', $desk, array('method'=>'post')) ?>
    </div>
  <?php endif ?>
</div>

<div id='menu'>
<?php include_component('desk','list', array(
  'open_bill'=> $bill
)) ?>
</div>