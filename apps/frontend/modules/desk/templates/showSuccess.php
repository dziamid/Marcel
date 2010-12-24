<h1>Стол №<?php echo $desk->getNumber() ?></h1>

<a href="<?php echo url_for('desk_edit', $desk) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('desk') ?>">List</a>

<h1>Счета</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Number</th>
      <th>Desk</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($desk->getBills() as $bill): ?>
    <tr>
      <td><a href="<?php echo url_for('bill_show', $bill) ?>"><?php echo $bill->getId() ?></a></td>
      <td><?php echo $bill->getNumber() ?></td>
      <td><?php echo $bill->getDeskId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>