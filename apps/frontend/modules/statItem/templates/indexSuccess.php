<?php use_helper('I18N', 'Date', 'Number') ?>
<?php include_partial('statItem/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Статистика по наименованию', array(), 'messages') ?></h1>

  <?php include_partial('statItem/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('statItem/list_header', array('pager' => $pager)) ?>
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
    <?php include_partial('statItem/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('statItem/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('statItem/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('statItem/list_actions', array('helper' => $helper)) ?>
      <li class="sf_admin_action_save_report">
        <?php echo link_to(__('Сохранить отчет', array(), 'messages'), 'statItem/ListSaveReport', array('method'=>'post')) ?>
      </li>

    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('statItem/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
