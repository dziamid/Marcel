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
          <th>Price</th>
          <th>Total quantity</th>
          <th>Total sum</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $i => $item): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
        <tr class="sf_admin_row <?php echo $odd ?>">
          <td class="sf_admin_text"><?php echo $item['name'] ?></td>
          <td><?php echo $item['price'] ?></td>
          <td><?php echo $item['total_quantity'] ?></td>
          <td><?php echo $item['total_sum'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>        
  </div>
  
</div>
