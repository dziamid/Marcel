$(document).ready(function(){
  //select links in menu
  $('#menulist').bind('click',function(e){
    var target = $(e.target).closest('div.menu_item a');    
    e.preventDefault();
    if (target.length)
    {
      $.post(target.attr('href'), function(data) {
        $('#openbill table.bill').html(data);
      });
    }
  });
  //delete links in bill
  $('#openbill table.bill').bind('click',function(e){
    e.preventDefault();
    var target = $(e.target).closest('a');
    if (target.length)
    {
      $.post(target.attr('href'), function(data) {
        $('#openbill table.bill').html(data);
      });      
    }
  });
});