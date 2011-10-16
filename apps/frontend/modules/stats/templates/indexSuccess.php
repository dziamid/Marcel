<?php use_stylesheet('/sfDoctrinePlugin/css/global.css', 'first') ?> 
<?php use_stylesheet('/sfDoctrinePlugin/css/default.css', 'first') ?> 

<div id="sf_admin_container">
  
  <h1>Статистика по наименованию</h1>
  
  <div id="sf_admin_bar">
    <?php include_partial('stats/filters', array('form' => $filters)) ?>
  </div>
  
  <div id="sf_admin_content">
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
  #sf_admin_content .price,
  #sf_admin_content .quantity,
  #sf_admin_content .sum {
    text-align: right;
  }
  
</style>
