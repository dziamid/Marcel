$(document).ready(function(){
  //initially only show first level
  $('.tree .node').not('.level_0').hide();
  //hide all items
  $('.items li').hide();
  $('.tree').click(function(e){
    var target = $(e.target).closest('li.button');
    if (target.length)
    {
      target.addClass('ui-state-focus');
    }
  });
  $('.tree .node').bind('click', function(e){
    var target = $(e.target).closest('li');
    if (target.length)
    {
      toggleNodes(target);
      refreshItems(target);
    }
  });
  
  function toggleNodes(target)
  {
    var id = parseInt(target.attr('data-id'));
    var parent_node = target.closest('.node');
    //hide all descendants
    parent_node.find('.node').hide();
    //make all descendants button inactive
    parent_node.find('li.button').removeClass('ui-state-focus');
    //show all related children
    parent_node.children('.node').filter(function(){
      return parseInt($(this).attr('data-parent')) == id;
    }).show(); 
  }
  
  function refreshItems(target)
  {
    var id = parseInt(target.attr('data-id'));

    var items = $('.items li');
    items.show();
    items.not('[data-parent='+id+']').hide();
    
  }
  


});