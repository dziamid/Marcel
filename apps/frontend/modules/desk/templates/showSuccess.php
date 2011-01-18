<?php use_stylesheet('print.css', '', array('media'=>'print')) ?>

<div id='openbill' class='area'>
  <?php if ($openbill->isNotNull()): ?>
    <h1>CЧЁТ № <span><?php echo $openbill->getNumber() ?></span></h1>
      
    <div class="header">
      <p><small>Юридическое лицо, индивидуальный предприниматель</small></p>
      <p><span><?php echo sfConfig::get('app_billheader_company') ?></span></p>
      <p><small>Торговый объект общественного питания</small>
      <p><span><?php echo sfConfig::get('app_billheader_cafe') ?></span></p>
      <h1>CЧЁТ № <span><?php echo $openbill->getNumber() ?></span></h1>
      <p><small>Официант (бармен): </small> <span>Ефименко К.Б.</span></p>
      <p><small>Дата выдачи счёта: </small> <span><?php echo $today ?></span></p>  
    </div>
    <?php include_partial('bill/show',array('bill'=>$openbill)) ?>
    <div class="footer">
      <p><small>Подпись официанта (бармена)</small> ______________</p>
    </div>
    <div class='tools'>
      <?php echo link_to('Закрыть стол', 'desk_close', $desk, array('method'=>'post')) ?>
      <a href="javascript:window.print()">Распечатать счёт</a>
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
  'open_bill'=> $openbill
)) ?>
</div>