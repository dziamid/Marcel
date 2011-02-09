<?php use_helper('I18N', 'Date', 'Number') ?>
<?php include_partial('adminItem/assets') ?>
<?php use_javascript('jquery.jqplot.min.js') ?>
<?php use_javascript('jqplot.barRenderer.min.js') ?>
<?php use_javascript('jqplot.categoryAxisRenderer.min.js') ?>
<?php use_javascript('jqplot.js') ?>


<div id="sf_admin_container">
  <h1><?php echo __('Статистика', array(), 'messages') ?></h1>

  <?php include_partial('adminItem/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('adminItem/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <div class="sf_admin_filter totalsum">
      <?php if ($total_kitchen > 0): ?>
        Кухня: <?php echo format_number($total_kitchen) ?>
        <br />
      <?php endif; ?>
      <?php if ($total_bar > 0): ?>
        Бар: <?php echo format_number($total_bar) ?>
        <br />
      <?php endif; ?>
      Общая сумма: <?php echo format_number($totalsum) ?>
    </div>
    <?php include_partial('adminItem/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('adminItem/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('adminItem/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('adminItem/list_actions', array('helper' => $helper)) ?>
    </ul>
    <div id="chart" style="height:200px;width:500px; "></div>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminItem/list_footer', array('pager' => $pager)) ?>
  </div>
</div>