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
