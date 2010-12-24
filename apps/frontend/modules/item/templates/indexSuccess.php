<h1>Items List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Menu item</th>
      <th>Bill</th>
      <th>Quantity</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $item): ?>
    <tr>
      <td><a href="<?php echo url_for('item_show', $item) ?>"><?php echo $item->getId() ?></a></td>
      <td><?php echo $item->getMenuItemId() ?></td>
      <td><?php echo $item->getBillId() ?></td>
      <td><?php echo $item->getQuantity() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('item_new') ?>">New</a>
