$(document).ready(function(){
  //select links in menu
  $('#menu').bind('click',function(e){
    e.preventDefault();
    var target = $(e.target).closest('div.item');
    var bill_id = $('#bills .ui-tabs-selected').attr('data-id');
    if (target.length)
    {
      $.post(target.attr('data-href'), {bill_id: bill_id}, function(data) {
        var bill_id = $('#bills .ui-tabs-selected').attr('data-id');
        $('#bill-'+bill_id+' div.body').html(data);
      });
    }
  });
  //delete links in bill
  $('#bills').bind('click',function(e){
    var target = $(e.target).closest('a.unselect');
    if (target.length)
    {
      e.preventDefault();
      $.post(target.attr('href'), function(data) {
        var bill_id = $('#bills .ui-tabs-selected').attr('data-id');
        $('#bill-'+bill_id+' div.body').html(data);
      });      
    }
  });
});