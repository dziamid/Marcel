<?php use_helper('Number') ?>

<?php use_stylesheet('/sfDoctrinePlugin/css/global.css', 'first') ?> 
<?php use_stylesheet('/sfDoctrinePlugin/css/default.css', 'first') ?> 

<div id="sf_admin_container">
  
  <h1>Статистика по наименованию</h1>
  
  <div id="sf_admin_bar">
    <table class="totals">
      <tbody>
        <tr>
          <th><label>Бар:</label></th>
          <td><?php echo format_number($totals[MenuGroup::TYPE_BAR]) ?></td>
        </tr>
        <tr>
          <th><label>Кухня:</label></th>
          <td><?php echo format_number($totals[MenuGroup::TYPE_KITCHEN]) ?></td>
        </tr>
        <tr>
          <th><label>Всего:</label></th>
          <td><?php echo format_number($totals[MenuGroup::TYPE_BAR] + $totals[MenuGroup::TYPE_KITCHEN]) ?></td>
        </tr>
      </tbody>
    </table>
    <?php include_partial('stats/filters', array('form' => $filters)) ?>
  </div>
  
  <div id="sf_admin_content">
    <ul class="sf_admin_actions">
      <li class="sf_admin_action_save_report">
        <?php echo link_to(__('Сохранить отчет', array(), 'messages'), 'stats/ListSaveReport', array('method'=>'post')) ?>
      </li>
      <li class="sf_admin_action_save_day_report">
        <?php echo link_to(__('Сохранить отчет за день', array(), 'messages'), 'stats/ListSaveDayReport', array('method'=>'post')) ?>
      </li>
    </ul>
    
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Price</th>
          <th>Total quantity</th>
          <th>Total sum</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $i => $item): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
        <tr class="sf_admin_row <?php echo $odd ?>">
          <td class="name"><?php echo $item['name'] ?></td>
          <td class="type"><?php echo MenuGroup::getTypeName($item['type']) ?></td>
          <td class="price"><?php echo $item['price'] ?></td>
          <td class="quantity"><?php echo $item['total_quantity'] ?></td>
          <td class="sum"><?php echo $item['total_sum'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>        
  </div>
  
</div>

<style type="text/css">
  #sf_admin_bar .totals td,
  #sf_admin_bar .price,
  #sf_admin_bar .quantity,
  #sf_admin_bar .sum {
    text-align: right;
  }
  
</style>
