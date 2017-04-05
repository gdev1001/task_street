(function(){
	var root = this,
		Chart = root.Chart,
		helpers = Chart.helpers;

	Chart.Type.extend({
		name: "MultiLevelPie",
		defaults: {
			// Boolean - Whether we should show a stroke on each segment
			segmentShowStroke : true,

			// String - The colour of each segment stroke
			segmentStrokeColor : "#fff",

			// Number - The width of each segment stroke
			segmentStrokeWidth : 1,

			// Number - Width of each segment
			segmentWidth: 40,

			// String - Default highlight for segments
			segmentHighlight: "#dadada",

			// Number - Start angle in radians
			startAngle: Math.PI * 1.5,

			// Number - Maximum number of children to show before halting
			maxChildren: 150,
		},

		initialize: function(data){

			this.SegmentArc = Chart.Arc.extend({
				ctx : this.chart.ctx,
				x : this.chart.width/2,
				y : this.chart.height/2
			});
			depth = this.getDepth(data);
			this.options.segmentWidth = (Math.min(this.chart.width, this.chart.height)*1)/(2*depth);
			console.log(this);
			this.calculateTotal(data);

			this.segments = [];
			this.all_segments = [];

			helpers.each(data, function(node){
				this.addSegments(node, 0, this.segments);
			}, this);

			// Set up tooltip events on the chart
			// if (this.options.showTooltips){
			if (true){
				helpers.bindEvents(this, this.options.tooltipEvents, function(evt){
					var activeSegments = (evt.type !== 'mouseout') ? this.getSegmentsAtEvent(evt) : [];

					helpers.each(this.all_segments,function(segment){
						segment.restore(["fillColor"]);
					});
					helpers.each(activeSegments,function(activeSegment){
						activeSegment.fillColor = activeSegment.highlightColor;
					});
					this.showTooltip(activeSegments);
				});
			}

			this.render();

		},
		getSegmentsAtEvent : function(e){
			var segmentsArray = [];

			var location = helpers.getRelativePosition(e);

			helpers.each(this.all_segments,function(segment){
				if (segment.inRange(location.x,location.y)) segmentsArray.push(segment);
			},this);
			return segmentsArray;
		},
		addSegments: function(segmentData, depth, collection){

			var innerRadius = depth * this.options.segmentWidth,
				outerRadius = innerRadius + this.options.segmentWidth;

			if (segmentData.children && segmentData.children.length == 1) {
				this.addSegments(segmentData.children[0], depth, collection);
			} else {
				var segment = new this.SegmentArc({
					value : segmentData.value,
					outerRadius : outerRadius,
					innerRadius : innerRadius,
					fillColor : segmentData.color,
					highlightColor : segmentData.highlight || this.options.segmentHighlight || segmentData.color,
					showStroke : this.options.segmentShowStroke,
					strokeWidth : this.options.segmentStrokeWidth,
					strokeColor : this.options.segmentStrokeColor,
					startAngle : this.options.startAngle,
					circumference : (this.options.animation) ? 0 : this.calculateCircumference(segmentData.value),
					label : segmentData.label,
					children: []
				});

				this.all_segments.push(segment);
				collection.push(segment);

				if (segmentData.children) {
					if (segmentData.children.length <= this.options.maxChildren) {
						helpers.each(segmentData.children, function(childData){
							this.addSegments(childData, depth + 1, segment.children);
						}, this);
					}
				}
			}
		},
		calculateCircumference: function(value){
			return (value / this.total) * (Math.PI * 2);
		},
		calculateTotal : function(data){
			this.total = 0;
			helpers.each(data, function(segment){
				this.total += segment.value;
			}, this);
		},
		reflow: function(){
			helpers.extend(this.SegmentArc.prototype, {
				x: this.chart.width / 2,
				y: this.chart.height / 2,
			});
		},
		draw: function(easeDecimal){

			var animDecimal = (easeDecimal) ? easeDecimal : 1;

			this.clear();

			var prev = {endAngle: this.options.startAngle};
			helpers.each(this.segments, function(segment, index){
				this.drawSegment(segment, prev, animDecimal);
				prev = segment;
			}, this);
		},
		drawSegment: function(segment, previousSegment, animDecimal){
			segment.transition({
				circumference : this.calculateCircumference(segment.value)
			}, animDecimal);

			segment.startAngle = previousSegment.endAngle;

			segment.endAngle = segment.startAngle + segment.circumference;
			segment.draw();

			if (segment.children){
				var prev = {
					endAngle: segment.startAngle
				};

				helpers.each(segment.children, function(child, index){
					this.drawSegment(child, prev, animDecimal);
					prev = child;
				}, this);
			}

			return segment;
		},
		getDepth : function(d){
		    if(d.length===0){
		        return 1;
		    }
		    max_depth = 0;
		    for(i=0; i<d.length; i++){
		        depth = this.getDepth(d[i].children);
	            if(depth>max_depth){
	                max_depth = depth;
	            }
		    }
		    return max_depth+1;
		}
	});
}).call(this);
