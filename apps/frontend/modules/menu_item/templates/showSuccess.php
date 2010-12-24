<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $menu_item->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $menu_item->getName() ?></td>
    </tr>
    <tr>
      <th>Price:</th>
      <td><?php echo $menu_item->getPrice() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('menu_item_edit', $menu_item) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('menu_item') ?>">List</a>
