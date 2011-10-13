$(document).ready(function(){
  //admin filter click
  $('span.set_today').click(function(e) {
    var target = $(e.target);
    var day = target.attr('data-day');
    var month = target.attr('data-month');
    var year = target.attr('data-year');
    $("#item_filters_created_at_from_day").attr('value', day);
    $("#item_filters_created_at_to_day").attr('value', day);
    $("#item_filters_created_at_from_month").attr('value', month);
    $("#item_filters_created_at_to_month").attr('value', month);
    $("#item_filters_created_at_from_year").attr('value', year);
    $("#item_filters_created_at_to_year").attr('value', year);

  });
  
  $('#item_filters_menu_group').change(function(e){
    onMenuGroupChange($(e.target));
  });
  //onMenuGroupChange('#item_filters_menu_group');

  /* sort menu item table rows */
  if ($('#sf_admin_content table .sf_admin_list_td_index').length)
  {
    $('#sf_admin_content table').tableDnD({
      dragHandle: 'sf_admin_list_td_index'
    });
    $('#sf_admin_content .sf_admin_action_save_order a').click(function(e){
      e.preventDefault();
      var index = $('#sf_admin_content table').tableDnDSerialize();
      $.post($(e.target).attr('href'), index, function(data){
        location.reload()
      });
    });
  }
});

function onMenuGroupChange(target)
{
  var group = $(target).attr('value');
  var all_options = $('#item_filters_menu_item_id option');
  all_options.show();
  if (group != '')
  {
    //hide all group unrelated items
    var options = $('#item_filters_menu_item_id option[data-group!='+group+']');
    options.hide();  
  }    
}