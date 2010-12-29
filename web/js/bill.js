$(document).ready(function(){
  //select links in menu
  $('#menulist').bind('click',function(e){
    e.preventDefault();
    $.post($(e.target).attr('href'), function(data) {
      $('#openbill table.bill').html(data);
    });
  });
  //delete links in bill
  $('#openbill table.bill').bind('click',function(e){
    e.preventDefault();
    var url = $(e.target).parents('a').attr('href');
    $.post(url, function(data) {
      $('#openbill table.bill').html(data);
    });
  });
});