<?php use_stylesheet('print.css', '', array('media'=>'print')) ?>

<div id='openbill' class='area'>
  <?php if ($openbill->isNotNull()): ?>
    <h1>Стол №<?php echo $desk->getNumber() ?>, счет #<?php echo $openbill->getNumber() ?></h1>
    <?php include_partial('bill/show',array('bill'=>$openbill)) ?>
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