<tr class="sf_admin_form_row sf_admin_date sf_admin_filter_field_created_at">
  <th>
    <?php echo $form['created_at']->renderLabel() ?>
  </th>
  <td>
    <?php echo $form['created_at']->renderError() ?>
    <?php echo $form['created_at']->render() ?>
    <span class='link this-day'>Сегодня</span>
    <span class='link this-week'>Эта неделя</span>
    <span class='link this-month'>Этот месяц</span>
  </td>
</tr>


<script type="text/javascript">
$(document).ready(function(){
  var filterDates = <?php echo json_encode($dates) ?>;

  $('span.this-day').click(function(e) {
    setFilterDates(filterDates['this-day']);
  });
  $('span.this-week').click(function(e) {
    setFilterDates(filterDates['this-week']);
  });
  $('span.this-month').click(function(e) {
    setFilterDates(filterDates['this-month']);
  });

});

function setFilterDates(dates)
{
  $("#item_filters_created_at_from_day").attr('value', dates['from']['day']);
  $("#item_filters_created_at_to_day").attr('value', dates['to']['day']);
  $("#item_filters_created_at_from_month").attr('value', dates['from']['month']);
  $("#item_filters_created_at_to_month").attr('value', dates['to']['month']);
  $("#item_filters_created_at_from_year").attr('value', dates['from']['year']);
  $("#item_filters_created_at_to_year").attr('value', dates['to']['year']);  
}
</script>
