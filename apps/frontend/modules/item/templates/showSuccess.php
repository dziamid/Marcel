<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $item->getId() ?></td>
    </tr>
    <tr>
      <th>Menu item:</th>
      <td><?php echo $item->getMenuItemId() ?></td>
    </tr>
    <tr>
      <th>Bill:</th>
      <td><?php echo $item->getBillId() ?></td>
    </tr>
    <tr>
      <th>Quantity:</th>
      <td><?php echo $item->getQuantity() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('item_edit', $item) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('item') ?>">List</a>
