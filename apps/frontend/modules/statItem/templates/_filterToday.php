<tr class="sf_admin_form_row sf_admin_date sf_admin_filter_field_created_at">
  <td>
    Добавлено
  </td>
  <td>
    <?php echo $form['created_at']->renderError() ?>
    <?php echo $form['created_at']->render() ?>
    <span class='link set_today' data-day='<?php echo $day ?>' data-month='<?php echo $month ?>' data-year='<?php echo $year ?>'>Сегодня</span>
  </td>
</tr>