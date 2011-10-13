<h1>Items List</h1>

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
    <?php foreach ($items as $item): ?>
    <tr>
      <td><?php echo $item['name'] ?></td>
      <td><?php echo $item['price'] ?></td>
      <td><?php echo $item['total_quantity'] ?></td>
      <td><?php echo $item['total_sum'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('stats_new') ?>">New</a>
  
    <?php include_partial('stats/filters', array('form' => $filters)) ?>

