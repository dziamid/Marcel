
<a href="<?php echo url_for('bill_edit', $bill) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('bill') ?>">List</a>

<h1>Счёт №<?php echo $bill->getNumber() ?> (стол <?php echo $bill->getDeskId() ?>)</h1>

<?php include_partial('show', array('bill'=>$bill)) ?>