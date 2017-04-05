
/******03-03-2017-notifications*****/
jQuery('.compaby_bell').click(function () {
   get_company_notifications();
    jQuery.ajax({ 
        url: '/noticemarkread',
        type : "get",
        success : function(data) {
            jQuery('.notice_count_badge').html(0).fadeIn('slow');
        }
    });
});

setInterval(function () {
    company_notificationscount();
}, 5000);

// to get notifications data from ajax
function get_company_notifications()
{ 
    jQuery.ajax({
      url: '/get_notifications',
      type:'GET',

      //async: false,
      success: function(response)
      {             
        jQuery(".succes").html(response);
      }
    });
}

// to get notification count
function company_notificationscount()
{ 
    jQuery.ajax({
      url: '/notificationscount',
      type:'GET',
			
      success: function(response)
      {  
       jQuery('.notice_count_badge').html(response);
      }
    });
}

/********/

