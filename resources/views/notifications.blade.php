
<?php
    $notif = \Notice::text()->all();
    $uid = Auth()->user()->id;
    $count = count(\Notice::text()->unread());
?>

@if (count($notif)>0)
  @foreach($notif as $notice) 
     {{-- */ $notice_message = str_replace('xxx', $notice->type_title, $notice->message); /* --}}
     <span><?php echo html_entity_decode($notice_message);?></span>
  @endforeach
@else 
  <span>No Notification</span> 
         
@endif  
          