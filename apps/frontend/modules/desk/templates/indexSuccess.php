<h1>Desks List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Number</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($desks as $desk): ?>
    <tr>
      <td><a href="<?php echo url_for('desk_show', $desk) ?>"><?php echo $desk->getId() ?></a></td>
      <td><?php echo $desk->getNumber() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('desk_new') ?>">New</a>
