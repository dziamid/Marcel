
$(document).ready(function(){
  $('.tree .node').bind('click', function(e){
    var target = $(e.target).closest('li');
    if (target.length)
    {
      onNodeClick(target);
      e.stopPropagation();
    }
  });

  //initially only show first level
  $('.tree .node').not('.level_0').hide();
  
  //hide all items
  $('.items li').hide();
  
  //and click first item in list
  var first_root = $('.tree .level_0 li.button')[0];
  onNodeClick(first_root);
});
  
  function onNodeClick(target)
  {
    target = $(target);
    toggleNodes(target);
    refreshItems(target);
  }
  
  function toggleNodes(target)
  {
    var id = parseInt(target.attr('data-id'));
    var parent_node = target.closest('.node');
    //hide all descendants
    parent_node.find('.node').hide();
    //make all descendants button inactive and current - active
    parent_node.find('li.button').removeClass('ui-state-focus');
    target.addClass('ui-state-focus');
    //show all related children
    var child_node = parent_node.children('.node').filter(function(){
      return parseInt($(this).attr('data-parent')) == id;
    });
    //fix children positioning
    var position = parent_node.css('height');
    child_node.show().css('top',position);
    //fix container height
    var container_height = child_node.height() + parent_node.height();
    $(parent_node).parents('.node').each(function(){
      container_height += $(this).height();
    });
    $('.tree').height(container_height);
  }
  
  function refreshItems(target)
  {
    var id = parseInt(target.attr('data-id'));

    var items = $('.items li');
    items.show();
    items.not('[data-parent='+id+']').hide();
    
  }
