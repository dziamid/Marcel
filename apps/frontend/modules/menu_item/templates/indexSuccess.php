<h1>Menu items List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($menu_items as $menu_item): ?>
    <tr>
      <td><a href="<?php echo url_for('menu_item_show', $menu_item) ?>"><?php echo $menu_item->getId() ?></a></td>
      <td><?php echo $menu_item->getName() ?></td>
      <td><?php echo $menu_item->getPrice() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('menu_item_new') ?>">New</a>
