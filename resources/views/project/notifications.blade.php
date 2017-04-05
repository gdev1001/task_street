
<?php
    $notif = \Notice::text()->all();
    $uid = Auth()->user()->id;
    $count = count(\Notice::text()->unread());
    if($task){
	    $task_date = (strtotime($task->created_at)+172800);
	    $now = time();
		$task_time = $task_date-$now;
		$task_hours = floor($task_time / (3600));
	}	
	$i=0;
  // echo $hourdiff = round((strtotime($time1) - strtotime($time2)));
      
?>
@if($task)
	@if($task->isCommited != 1)
		@if($task_hours> 48 AND $task_hours< 24)
			{{-- */ $i=1; /* --}}
		 	<span>Less than <strong>2 Days</strong> is remaining to commit your task in {{$task->name}}</span>
		@endif
		@if($task_hours< 24 AND $task_hours> 12)
			{{-- */ $i=1; /* --}}
		 	<span>Less than <strong>1 Days</strong> remaining to commit your task in {{$task->name}}</span>
		@endif
		@if($task_hours < 10 AND $task_hours> 0)
			{{-- */ $i=1; /* --}}
			<span>Less than <strong>{{$task_hours}} Hours</strong> remaining to commit your task in {{$task->name}}</span>	
		@endif
	@endif	
@endif

@if (count($notif)>0)
  @foreach($notif as $notice) 
     {{-- */ $notice_message = str_replace('xxx', $notice->type_title, $notice->message); /* --}}
     <span><?php echo html_entity_decode($notice_message);?></span>
  @endforeach
@else
	@if($i==0)
  		<span>No Notification</span> 
 	@endif
            
@endif  
                            