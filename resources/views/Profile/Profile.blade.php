@extends('app')

@section('addheader')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

	<script src="http://d3js.org/d3.v3.min.js"></script>
    <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">

@endsection

@section('content')

	<div class="row">

			@include('Profile.partial')


	<script type="text/javascript">

		function setValue()
		{
			var data = '';
			$('p#test').each(function() {
					data = data + $(this).html()+'\n\r';
				});
			$('input#what').val(data);

			$.ajax({ 
                url : "{{ URL::route('profile.resumeStore')}}",
                type : "get",
                data : {'about':$('input#what').val()},
                success : function(data) {
                    alert("success");
                }
            });
		};


	</script>

	<script type="text/javascript">
		function rnd(n,m){
			return parseInt(Math.random()*(m-n)+n);
		}
	
	    function getMousePos(canvas, evt) {
	        var rect = canvas.getBoundingClientRect();
	        return {
	          x: evt.clientX - rect.left,
	          y: evt.clientY - rect.top
	    	};
	    }
	
		window.onload = function() {
			var canvas = document.getElementById('c1');
			var tipCanvas = document.getElementById('tip');
			var gd = canvas.getContext('2d');
			var tipCtx = tipCanvas.getContext('2d');
	
			var atext = [];
			var aData = [];
			var aLevel = [];
			var rect = [];
			var rectCount = 0;
	
			{{--@foreach ($skillUsers as $key=>$item)--}}
				{{--atext[{{ $key }}] = '{{ $item->skill->name }}';--}}
				{{--aData[{{ $key }}] = '{{ $item->hour }}';--}}
				{{--aLevel[{{ $key }}] = '{{ $item->level }}';--}}
			{{--@endforeach--}}
			{{----}}
			var space = 20;
			var topSpace = canvas.height*0.3;
			var iMax=Math.max.apply(null,aData)
			var w=canvas.width*0.07;
			var lastR=0;
			for(var i=0;i<aData.length;i++) {
				var l=lastR+space;
				var h=(aData[i]/iMax)*(canvas.height-topSpace);
				var t=canvas.height-h;
				gd.fillStyle='rgba(141, 164, 180, 1)';
				gd.fillRect(l,t-15,w,h);
				lastR=l+w;
	
				rect[rectCount] = {
							'x' : l,
							'y' : t-15,
							'w' : w,
							'h' : h,
							'lv' : aLevel[i]
						};
				rectCount ++;
	
				gd.font = "15 px Georgia";
				gd.fillText(atext[i], l+canvas.width*0.01, canvas.height*0.98);
			}
	
	        canvas.addEventListener('mousemove', function(evt) {
	            var mousePos = getMousePos(canvas, evt);
				var hit = 0;
				
	            for (var i = 0; i < rectCount; i ++) {
					if (mousePos.x >= rect[i].x && mousePos.x <= rect[i].x + rect[i].w) {
						if (mousePos.y >= rect[i].y && mousePos.y <= rect[i].y + rect[i].h) {
				            tipCanvas.style.left = (mousePos.x) + "px";
				            tipCanvas.style.top = (mousePos.y - 10) + "px";
				            tipCtx.clearRect(0, 0, tipCanvas.width, tipCanvas.height);
				            //                  tipCtx.rect(0,0,tipCanvas.width,tipCanvas.height);
				            tipCtx.fillText('Level: ' + rect[i].lv, 5, 15);	
				            hit = 1;	
				            break;
						}
					} 
	            }
	            
				if (hit == 0) {
					tipCanvas.style.left = "-200px";
				}
	            
	        }, false);
		}
	</script>



	<script type="text/javascript">
	  // Hack to make this example display correctly in an iframe on bl.ocks.org
	  d3.select(self.frameElement).style("height", "700px");
   	</script>


@endsection


