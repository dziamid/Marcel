<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $bill->getId() ?></td>
    </tr>
    <tr>
      <th>Number:</th>
      <td><?php echo $bill->getNumber() ?></td>
    </tr>
    <tr>
      <th>Desk:</th>
      <td><?php echo $bill->getDeskId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('bill_edit', $bill) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('bill') ?>">List</a>

<h1>Bill items</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Menu item name</th>
      <th>Menu item price</th>
      <th>Bill</th>
      <th>Quantity</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bill->getItems() as $item): ?>
    <tr>
      <td><a href="<?php echo url_for('item_show', $item) ?>"><?php echo $item->getId() ?></a></td>
      <td><?php echo $item->getMenuItem()->getName() ?></td>
      <td><?php echo $item->getMenuItem()->getPrice() ?></td>
      <td><?php echo $item->getBillId() ?></td>
      <td><?php echo $item->getQuantity() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<hr />
Всего: <?php echo $bill->getTotal() ?>