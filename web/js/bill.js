$(document).ready(function(){
  //select links in menu
  $('#menu').bind('click',function(e){
    e.preventDefault();
    var target = $(e.target).closest('.item');
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
    var target = $(e.target);
    if (target.closest('a.unselect').length)
    {
      unselectBillItem(e);
    }
    else if (target.closest('a.add').length)
    {
      addBillItem(e);
    }
    else if (target.closest('a.print').length)
    {
      printBill(e);
    }
    else if (target.closest('span.more').length)
    {
      showMore(e);
    }
    else if (target.closest('input[type=checkbox]').length)
    {
      e.preventDefault();
    }
  });

  function unselectBillItem(e) {
    e.preventDefault();
    target = $(e.target).closest('a.unselect');
    $.post(target.attr('href'), function(data) {
      var bill_id = $('#bills .ui-tabs-selected').attr('data-id');
      $('#bill-'+bill_id+' div.body').html(data);
    });     
  }
  function addBillItem(e) {
    e.preventDefault();
    target = $(e.target).closest('a.add');
    $.post(target.attr('href'), function(data) {
      var bill_id = $('#bills .ui-tabs-selected').attr('data-id');
      $('#bill-'+bill_id+' div.body').html(data);      
    });
  }
  function printBill(e) {
    e.preventDefault();
    target = $(e.target);

    window.print();
    $.post(target.attr('href'), function(data) {
      if (data == '1')
      {
        $('div.tools a.print').addClass('is_printed');
      }
    });    
  }
  function showMore(e) {
    e.preventDefault();
    var target = $(e.target);
    var parent = target.parents('div.tools');
    parent.children('div.icon.more').remove();
    parent.children('div.more').show();
  }
});