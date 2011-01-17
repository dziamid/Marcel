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
});