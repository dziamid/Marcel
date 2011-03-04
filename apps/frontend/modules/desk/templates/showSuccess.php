<?php use_stylesheet('print.css', '', array('media'=>'print')) ?>
<?php use_javascript('bill.js') ?>
        <h1>Стол #<?php echo $desk ?></h1>

<div id='bills' class='area'>

<?php if (count($bills)): ?>
  <script>
  $(function() {
    $( "#bills" ).tabs();
  });
  </script>
  <ul>
    <?php foreach ($bills as $bill): ?>
      <li data-id='<?php echo $bill->getId() ?>'><a href="<?php echo sprintf('#bill-%s',$bill->getId()) ?>">CЧЁТ #<?php echo $bill->getNumber() ?></a></li>
    <?php endforeach; ?>
  </ul>

  <?php foreach ($bills as $bill): ?>
    <div id='<?php echo sprintf('bill-%s',$bill->getId()) ?>' class='bill'>
      <div class="header">
        <p><small>Юридическое лицо, индивидуальный предприниматель</small></p>
        <p><span><?php echo sfConfig::get('app_billheader_company') ?></span></p>
        <p><small>Торговый объект общественного питания</small>
        <p><span><?php echo sfConfig::get('app_billheader_cafe') ?></span></p>
        <h1>CЧЁТ # <span><?php echo $bill->getNumber() ?></span></h1>
        <p>Стол: #<span><?php echo $desk ?></span></p>
        <p>Дата: <span><?php echo $bill_date->format('d/m/Y H:i') ?></span></p>  
        <p>Официант (бармен): <span><?php echo sfConfig::get('app_billheader_waiter') ?></span></p>
      </div>
      
      
      <div class="body">
        <?php include_partial('bill/show',array('bill'=>$bill)) ?>
      </div>
      
      <div class="footer">
        <p><small>Подпись официанта (бармена)</small> ______________</p>
      </div>
      <div class='tools'>
        <div class='icon print'><a href="<?php echo url_for('bill_print', $bill) ?>" class="print <?php echo $bill->getIsPrinted() ? 'is_printed':'' ?>">Распечатать счёт</a></div>
        <div class='icon open'><?php echo link_to('Открыть ещё счёт', 'desk_open', $desk, array('method'=>'post')) ?></div>
        <div class='icon close'><?php echo link_to('Закрыть счёт', 'bill_close', $bill, array('method'=>'post')) ?></div>
        <div class='icon delete'><?php echo link_to('Удалить счёт', 'bill_delete', $bill, array(
          'method'=>'delete',
          'confirm'=>sprintf('Удалить счёт #%s?', $bill->getNumber())
        )) ?></div>
        <div class="icon discount">
          <?php echo link_to('Счёт со скидкой', 'bill_discount', $bill, array('method'=>'post')) ?> <input type="checkbox" <?php echo $bill->getWithDiscount() ? "checked='checked'" : "" ?> ?>
        </div>
        <div class="icon hidden">
          <?php echo link_to('Скрытый счёт', 'bill_toggleHidden', $bill, array('method'=>'post')) ?> <input type="checkbox" <?php echo $bill->getIsHidden() ? "checked='checked'" : "" ?> ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

<?php else: ?>
  <div class='tools'>
    <div class='icon open'><?php echo link_to('Открыть счёт', 'desk_open', $desk, array('method'=>'post')) ?></div>
  </div>
<?php endif; ?>

</div>

<?php include_component('desk','list') ?>