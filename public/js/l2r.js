'use strict';

(function($){
  $(function() {
  var project_id = $('#project_id').val();
  var url = '/expertise/project_task_tree/' + project_id; 
  $.ajax({
      url: url,
      type:'GET',
      success: function(response){
        if(response.status == "ok"){          

          for(var i = 0; i < response.task_tree.length; i++){
            $('#chart-container_'+response.task_tree[i].id).orgchart({
              'data' : response.task_tree[i],
              'nodeContent': 'title',
              'direction': 'l2r'
            });
          }

          $('.orgchart').addClass('noncollapsable'); //

          $(".node").hover(
              function(e){ 
                $('#title_'+this.id).fadeOut();
                $('#content_'+this.id).fadeOut();
                var idtofetch=this.id;
                setTimeout(function(e) { 
                  //alert('#treeHover_'+idtofetch); 
                  $('#treeHover_'+idtofetch).css('opacity',1).fadeIn(600);
                }, 50);
                $("#leftBox_"+this.id).addClass("active");
              }, // over
            
              function(e){ 
                var idtofetch=this.id;
                //$('#treeHover_'+this.id).css('display', 'none');
                setTimeout(function(e) { 
                  $('#treeHover_'+idtofetch).css('opacity',0).fadeOut(600);
                  $('#title_'+idtofetch).css('opacity',1).fadeIn(600);
                  $('#content_'+idtofetch).css('opacity',1).fadeIn(600);
                }, 50);	
                $("#leftBox_"+this.id).removeClass("active");
              }  // out
          );

          $('.orgchart').each(function(elem){
            var chart_height = $(this).height() + 50;
            $(this).parent().css("max-height", chart_height + "px");
          }); //          

          if($('.l_page').height() < $('.r_page').height())
            $('.l_page').height($('.r_page').height());
        }
      }
  });

var currentZoom = 1.0;

    var  moztransform=1.0;
        $('#btn_ZoomIn').click( 
            function () {
              moztransform +=.1;
                $('.task-chart-container').css({'-moz-transform': 'scale('+moztransform+')'}).animate({ 'zoom': currentZoom += .1 }, 'slow');
            })
        $('#btn_ZoomOut').click(
            function () {
                moztransform -= .1;
                $('.task-chart-container').css({'-moz-transform': 'scale('+moztransform+')'}).animate({ 'zoom': currentZoom -= .1 }, 'slow');
            })
        $('#btn_ZoomReset').click(
            function () {
              moztransform = 1.0;
                currentZoom = 1.0
                $('.task-chart-container').css({'-moz-transform': 'scale('+moztransform+')'}).animate({ 'zoom': 1 }, 'slow');
            })
	
  });
   $('.task-chart-container').css({'-moz-transform': 'scale(1)'}).animate({ 'zoom': 1 }, 'slow');

   $('#project_select').change(function(e){
     window.location.href="/expertise/project/" + $('#project_select').val();
   });

})(jQuery);