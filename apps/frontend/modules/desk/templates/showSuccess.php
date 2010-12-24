<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $desk->getId() ?></td>
    </tr>
    <tr>
      <th>Number:</th>
      <td><?php echo $desk->getNumber() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('desk_edit', $desk) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('desk') ?>">List</a>
