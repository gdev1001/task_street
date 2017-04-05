<?php
// function to get progress in  %
function getProgress($completedTask,$totalTask)
{
	if($completedTask==0){
		return 10;
	}
	else{
		return round($completedTask/$totalTask,2)*90 + 10;
	}

}