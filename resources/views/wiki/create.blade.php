<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Shokse client project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="/images/favicon-icon.png" sizes="16x16">
    <!--Bootstrap-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--font-awesome CSS-->
    <link href="/css/font-awesome.min.css" rel="stylesheet">    
    <!--Custom Template CSS-->
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <!--Media Query CSS-->
    <link href="/css/media-query-all.css" rel="stylesheet" type="text/css"> 
    <link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <!--slick CSS-->
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>    
    <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
    
    <link href="{!! url('libs/summernote/summernote.css') !!}" type="text/css" rel="stylesheet" />
     
    <style type = "text/css">
        .note-editor{position:relative;border:0 !important;}
    </style>
    
  </head>
  <body>
    <header class="shokse-header block">
        <nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src="/images/shokse-logo.png" class="img-responsive" alt="logo"/></a>
              <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
                 <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
            </figcaption>
            <!-- /.navbar-header --> 
            <!--<figcaption class="nav-menu-right pull-right">
                <figcaption id="mobileMenuCollapsing" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav main-menu">
                        <li><button type="button" class="btn">Get Started</button></li>
                        <li class="get-started"><a href="#" class="search"></a></li>
                    </ul>
                </figcaption>
                <!-- /.collapse.navbar-collapse -->
                 
            <!--</figcaption>-->
            <figcaption class="search_cover navbar-collapse">
                <button type="button" class="btn">Menu</button></li>
                <a href="#" class="search marg1"></a>
            </figcaption>
            <!-- /.nav-right --> 
                      
          </figure>
          <!-- /row -->          
        </nav>
        <!-- /.container -->
    </header>
    <!-- /.shokse-header -->
    <main class="block task_text">
        <section class="block">
            <article class="container">
                <figure>
                    <div class="page_title">Task</div>
                    <h1 class="text-center">{{$projectname}}</h1>
                    <h6 class="text-center">TEAM <span>3</span></h6>
                    <div class="clearfix"></div>
                    <div class="img_cover2 pos_rel">
                        @foreach ($users as $user)
                            <div class="team_pics  {{($user->is_owner ? 'thumb_user_owner' : '')}}"><img src="/images/B7954792-8190-42B0-83ED-F07FEF52C9E3@3x.png" alt="team member"/>
                                <div class="team_pics_detail">
                                    <div class="image_cover12"><img src="/images/B7954792-8190-42B0-83ED-F07FEF52C9E3@3x.png" alt="image"/></div>
                                    <div class="text_cover12">
                                        <label>{{$user->name}}</label>
                                        <div class="clearfix"></div>
                                        <span>{{$user->email}}</span>
                                        <p>{{$user->is_owner ? "Owner" : ""}}</p>                                    
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>  
                    <div class="clearfix"></div>
                    <a href="#" class="add_btn" data-toggle="modal" data-target="#myModal"><img src="/images/D9A9C3F5-C5EC-40A6-9D20-C09AA0AF6DF4@3x.png" alt="add button"/></a>
                	<div class="modal fade pop_up" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="upper">
                                        <h2>invite people to your project</h2>
                                        <div class="clearfix"></div>
                                        <input type="text" class="search_btn2" placeholder="Search 12 connection" id="search_user"/>
                                    </div>
                                    <div class="lower">
                                        <div class="user_container">
                                            @foreach ($users as $user)
                                                <div class="work_box {{($user->is_owner ? 'user_owner' : '')}}">
                                                    <div class="pic_cover5">
                                                        <img src="/images/B7954792-8190-42B0-83ED-F07FEF52C9E3@3x.png" alt="image"/>
                                                    </div>
                                                    <div class="text_cover">
                                                        <a href="#" class="user_name">{{$user->name}}{{$user->is_owner ? "(Owner)" : ""}}</a>
                                                        <div class="clearfix"></div>
                                                        <a href="#" class="mail">{{$user->email}}</a>
                                                    </div>
                                                    <div class="check_btn"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <input type="text" class="not_invite" placeholder="Not listed above? Invite by email address..."/>
                                        <div class="clearfix"></div>
                                        <a href="#" class="persnl_mess">Include a personal message?</a>
                                        <div class="clearfix"></div>
                                        <a href="#" class="close_btn5">close</a>                                    
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
                <div class="tab_cover">
                    <div class="tabbing"> 
                      <!-- Nav tabs -->
                     @if(isset($page->id))
                      <ul class="nav nav-tabs" role="tablist">
                        @if(isset($can_create_page))
                            <li role="presentation" ><a href="/{{$name}}/wiki/{{ $page->id }}/create" ><i class="add"></i>add</a></li>
                        @endif
                        @if(isset($can_delete_page))
                            <li role="presentation"><a href="/{{$name}}/wiki/{{ $page->id }}/delete"><i class="delete"></i>delete</a></li>
                        @endif
                            <li role="presentation"><a href="/{{$name}}/wiki/{{ $page->id }}/refresh"><i class="refresh"></i>refresh</a></li>
                        @if(isset($can_edit_page) && $page->lock == 0)
                            <li role="presentation" class="active"><a href="#" ><i class="edit"></i>edit</a></li>
                            <li role="presentation"><a href="/{{$name}}/wiki/{{ $page['id'] }}/history"><i class="history"></i>history</a></li> -->
                        @endif
                        @if(isset($can_lock_page))
                            @if($page->lock == 1)
                                <li role="presentation"><a href="/{{$name}}/wiki/{{ $page['id'] }}/sendNotification?action=unlock" ><i class="lock_page"></i>UNLOCK THIS PAGE</a></li>
                            @elseif($page->lock == 0)
                                <li role="presentation"><a href="/{{$name}}/wiki/{{ $page['id'] }}/sendNotification?action=lock" ><i class="lock_page"></i>LOCK THIS PAGE</a></li>
                            @endif
                            
                        @endif
                      </ul>
                      @endif
                      <!-- Tab panes -->


                      <div class="tab-content tab_editor">                      
                        <div role="tabpanel" class="tab-pane active" id="add">
                            <form class="form-horizontal" action={{url("/".@$name."/wiki")}} method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="post">
                            
                            <label class="input_pic">Create New Page</label>
                            <div class="clearfix"></div>
                            <input type="text" class="form-control" id="title" name="title" placeholder="An Awesome Title">
                            <div class="clearfix"></div>
                            <br>
                            <div id="editor" >
                                <textarea v-model="input" debounce="300" name="raw" style="display: none !important;" id="inputText"></textarea>                                    
                                <textarea id="summernote" class="p_sec1a"></textarea>
                                <!--<div v-html="input | marked"></div>-->
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="bottom_buttons">
                                
                                <button type="submit" class="updatebtn">Save</button>
                                <a href="#" class="cancel">Cancel</a>
                            </div>
                            </form>
                        </div>
                       
                      </div>
                    </div>
                </div>
            </article> 
            <!-- /.container -->         
        </section>
        <!-- /.duis-quis --> 
    </main> 
    <!-- /main -->
    <footer class="block shokse-footer">
        <article class="container">
            <figure class="shokse-footer-top col-md-16 col-sm-16 col-xs-16">
                <figcaption class="col-md-8 col-sm-8 col-xs-16 footer-left">
                    <a href="#" class="footer-logo"><img src="/images/shokse-footer-logo.png" alt="footer-img" /></a>
                    <p class="primary-color shokse-matche">Shokse matches the perfect candidate to your projects in need. No matter how complicated, the Shokse management system gets your project done faster and bettter.</p>
                </figcaption>
                <!-- /figcaption col -->
                
                <figcaption class="col-md-8 col-sm-8 col-xs-16 footer-right">
                    <ul>
                        <li>
                            <h6>About us</h6>
                            <a href="#">Who We Are</a>
                        </li>
                        <li>
                            <h6>Quick Links</h6>
                            <a href="#">Register</a>
                        </li>
                        <li>
                            <h6>Supports</h6>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                    
                </figcaption>
                <!-- /figcaption col -->
                
            </figure>
            <!-- /.footer-top -->    
            
            <figure class="shokse-footer-bottom col-md-16 col-sm-16 col-xs-16">
                <figcaption class="col-md-8 col-sm-8 col-xs-16 social-link">
                	<a href="http://www.facebook.com/Shokse"><img src='{{asset("images/fb-icon.png")}}' alt="icon" /></a>
                  <a href="http://www.twitter.com/devshokse"><img src='{{asset("images/twiter-icon.png")}}' alt="icon" /></a>
                  <a href="http://www.linkedin.com/company/shokse"><img src='{{asset("images/link-in-icon.png")}}' alt="icon" /></a>
                </figcaption>
                <!-- /figcaption col -->
                
                <figcaption class="col-md-8 col-sm-8 col-xs-16 copyWrite">
                    <a href="#">© 2016 Shokse Ltd </a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy Policy</a>
                </figcaption>
                <!-- /figcaption col -->
                
            </figure>
            <!-- /.footer-bottom --> 
        
        </article>
        <!-- /article -->        
    </footer>
    <!-- /footer.shokse-footer -->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src='{{asset("js/jquery-ui.min.js")}}'></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/iscroll.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/slick.min.js"></script> 
    <!--
    <script src="{!! url('js/landing/jquery-1.12.2.min.js') !!}"></script>
    <script src="{!! url('js/expertise/bootstrap/bootstrap.min.js') !!}"></script>
    -->
    <script type="text/javascript">
    
    function OpenHoverstate(id) {   
 
         jQuery("#open_"+id).hide();
          jQuery("#open_"+id).animate({"left":"810px"}, "slow");
            jQuery("#close_"+id).show();
             jQuery("#close_"+id).animate({"left":"0px"}, "slow");
   
    
    }
    
    function CloseHoverstate(id) {  
   jQuery("#close_"+id).hide();
   jQuery("#close_"+id).animate({"left":"810px"}, "slow");
         jQuery("#open_"+id).show();
           jQuery("#open_"+id).animate({"left":"0px"}, "slow");
          
    
    
    }
    

    </script> 

<script type="text/javascript">
    jQuery( "#opent1a .dot_icon" ).click(function() {});
    jQuery( "#open1a .close_icon" ).click(function() {});

    jQuery('.dot_icon').click(function(){
        //alert(jQuery(this).parent().attr('class'));
        jQuery('.mid_other1').fadeOut( "slow");
        jQuery(this).parent().next().fadeIn( "slow", function() {
        // Animation complete.
        });
      });
      jQuery('.close_icon').click(function(){
        jQuery(this).parent().fadeOut( "slow", function() {
        // Animation complete.
      });
        });
          jQuery(document).on('click','.close_btn',function(){
          jQuery(this).parent().fadeOut("slow",function(){});
        });
  </script> 
 <script src="{!! url('marked.min.js') !!}"></script>
    <script src="/vue.js"></script>
    <script type="text/javascript">
        new Vue({
            el: '#editor',
            data: {
                input: ''
            },
            filters: {
                marked: marked
            }
        })
    </script>
 
       
 <script src="{!! url('libs/summernote/summernote.js') !!}"></script>
 
    <script>
        jQuery(document).ready(function() {
            jQuery("#summernote").summernote({
                height: 700,                 // set editor height
                minHeight: 700,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                  // set focus to editable area after initializing summernote
                padding: 20,
                placeholder: 'write here...',
                /*toolbar: [
                   ['style', ['bold']],
                   ['style', ['italic']],
                   ['style', ['underline']],
                                  
                   ['insert', ['picture']],
                   ['insert', [ 'video']],
                   ['table', ['table']],
                ]*/
            });
            // same as above
            jQuery("#summernote").on("summernote.change", function (e) {   // callback as jquery custom event
                console.log('it is changed');
                var input = jQuery("#inputText");
                input.val(jQuery('#summernote').summernote('code'));
                input.trigger("change");
            });
                 jQuery('.dropdown-toggle').dropdown();
            function  loadHtml() {
                var input = jQuery("#inputText");
                input.val(jQuery('#summernote').summernote('code'));
                input.trigger("change");
            }
            loadHtml();
        });
    
    /* Add and Autocomplete user on page*/
    function addUserIntoProject(id, name, image_url, email){
        jQuery.ajax({
            url: '/{{$name}}/wiki/{{$page->id}}/addUser',
            type: 'post',
            data: { _token: "{{ csrf_token() }}",
                    user_id: id },
            success: function (data){
                if(data.result == 'success'){
                    item_html = '';
                    item_html += '<div class="work_box">';
                    item_html += '<div class="pic_cover5">';
                    item_html += '<img src="'+image_url+'" alt="image"/>';
                    item_html += '</div>';
                    item_html += '<div class="text_cover">';
                    item_html += '<a href="#" class="user_name">'+name+'</a>';
                    item_html += '<div class="clearfix"></div>';
                    item_html += '<a href="#" class="mail">'+email+'</a>';
                    item_html += '<div class="check_btn"></div></div>';

                    thumb_html = '';
                    thumb_html += '<div class="team_pics"><img src="'+image_url+'" alt="team member"/>';
                    thumb_html += '<div class="team_pics_detail">';
                    thumb_html += '<div class="image_cover12"><img src="'+image_url+'" alt="image"/></div>';
                    thumb_html += '<div class="text_cover12">';
                    thumb_html += '<label>'+name+'</label>';
                    thumb_html += '<div class="clearfix"></div>';
                    thumb_html += '<span>'+email+'</span>';
                    thumb_html += '<p></p>';
                    thumb_html += '</div></div></div>';

                    if(jQuery('.user_owner').length == 0){
                        jQuery('.user_container').prepend(item_html);
                        jQuery('.img_cover2').prepend(thumb_html);
                    } else {
                        jQuery('.user_owner').after(item_html);
                        jQuery('.thumb_user_owner').after(thumb_html);
                    }

                    jQuery( "#search_user" ).autocomplete('option', 'source', data.availableUser);                    
                }
            }                        
        });
    }   

	jQuery(".team_pics img").click(function() {
        jQuery(this).parent().find('.team_pics_detail').show();        
    });

	jQuery('.team_pics_detail').click(function() {
        jQuery( '.team_pics_detail' ).hide();
        if(jQuery( '.team_pics_detail' ).is(":visible")){
            jQuery( '.team_pics_detail' ).hide();
        }        
    });

    jQuery(document).ready(function() {
        jQuery.ajax({
            url: '/{{$name}}/wiki/{{$page->id}}/userList',
            type: 'post',
            data: { _token: "{{ csrf_token() }}" },                        
            success: function (data){
                if(data.result == 'success'){
                    jQuery( "#search_user" ).autocomplete({
                        minLength: 0,
                        source: data.data,
                        focus: function( event, ui ) {
                            jQuery( "#search_user" ).val( ui.item.label );
                            return false;
                        },
                        select: function( event, ui ) {
                            var el = document.elementFromPoint(event.pageX, event.pageY);
                            if(jQuery(el).hasClass('fa-plus-circle')){
                                image_url = (ui.item.image) ? ui.item.image : "/images/B7954792-8190-42B0-83ED-F07FEF52C9E3@3x.png";
                                addUserIntoProject(ui.item.id, ui.item.name, image_url, ui.item.email);
                            }
                            return false;
                        }
                    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                        image_url = (item.image) ? item.image : "/images/B7954792-8190-42B0-83ED-F07FEF52C9E3@3x.png";
                        template_html = '';
                        template_html += '<div class="work_box">';
                        template_html += '<div class="pic_cover5">';
                        template_html += '<img src="'+image_url+'" alt="image"/>';
                        template_html += '</div>';
                        template_html += '<div class="text_cover">';
                        template_html += '<span class="user_name">'+item.name+'</span>';
                        template_html += '<div class="clearfix"></div>';
                        template_html += '<span class="mail">'+item.email+'</span>';
                        template_html += '</div><div class="check_btn"><a href="#" class="link_add_user" data-id="'+item.id+'"><i class="fa fa-icon fa-plus-circle"></i></a></div></div>';
                        return jQuery( "<li>" )
                            .append( template_html )
                            .appendTo( ul );
                    };    
                }
            },
            error:function(){
            }
        });
    });        
    </script>   
    
  </body>
</html>
