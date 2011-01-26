$(document).ready(function(){
  //select links in menu
  $('#menulist').bind('click',function(e){
    var target = $(e.target).closest('div.menu_item a');    
    e.preventDefault();
    if (target.length)
    {
      $.post(target.attr('href'), function(data) {
        $('#bill_body').html(data);
      });
    }
  });
  //delete links in bill
  $('#bill_body').bind('click',function(e){
    e.preventDefault();
    var target = $(e.target).closest('a');
    if (target.length)
    {
      $.post(target.attr('href'), function(data) {
        $('#bill_body').html(data);
      });      
    }
  });
});