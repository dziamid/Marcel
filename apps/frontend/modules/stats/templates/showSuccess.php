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
    <tr>
      <th>Price:</th>
      <td><?php echo $item->getPrice() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $item->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $item->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('stats_edit', $item) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('stats') ?>">List</a>
