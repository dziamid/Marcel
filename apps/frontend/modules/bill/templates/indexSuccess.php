<h1>Bills List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Number</th>
      <th>Desk</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bills as $bill): ?>
    <tr>
      <td><a href="<?php echo url_for('bill_show', $bill) ?>"><?php echo $bill->getId() ?></a></td>
      <td><?php echo $bill->getNumber() ?></td>
      <td><?php echo $bill->getDeskId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('bill_new') ?>">New</a>
