<?php
/* @var $this SiteController */
	$this->pageTitle=Yii::app()->name;

	$this->widget('ext.EFullCalendar.EFullCalendar', array(
    // polish version available, uncomment to use it
    // 'lang'=>'pl',
    // you can create your own translation by copying locale/pl.php
    // and customizing it
 
    // remove to use without theme
    // this is relative path to:
    // themes/<path>
    'themeCssFile'=>'cupertino/theme.css',
 
    // raw html tags
    'htmlOptions'=>array(
        // you can scale it down as well, try 80%
        'style'=>'float: right; width:720px'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next',
            'center'=>'title',
            'right'=>'month,agendaWeek,agendaDay'
        ),
		'defaultView'=>'agendaDay',
        'lazyFetching'=>true,
        'events'=>$calendarEventsUrl, // action URL for dynamic events, or
        'events'=>array() // pass array of events directly
 
        // event handling
        // mouseover for example
        //'eventMouseover'=>new CJavaScriptExpression("js_function_callback"),
    )
));
?>

<style type='text/css'>
			
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
		}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}
		
	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}
	#calendar {
		float: right;
		width: 500px;
		}

</style>

<script type='text/javascript'>
	$(document).ready(function() {
	
		/* initialize the external events
		-----------------------------------------------------------------*/
	
	 	$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	});
</script>
<div style="width: 150px; float: left; border:1">
	<div id='external-events'>
		<h4>Draggable Events</h4>
		<div class='external-event'>My Event 1</div>
		<div class='external-event'>My Event 2</div>
		<div class='external-event'>My Event 3</div>
		<div class='external-event'>My Event 4</div>
		<div class='external-event'>My Event 5</div>
		<p>
			<input type='checkbox' id='drop-remove' /> <label for='drop-remove'>remove after drop</label>
		</p>
	</div>
</div>




