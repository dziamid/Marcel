$(document).ready(function(){
  
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