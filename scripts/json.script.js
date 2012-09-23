 
  jQuery.noConflict();
  
  jQuery(document).ready(function() { 
  jQuery("#main_table").tablesorter();
	
		 
    jQuery("#calendars_container").click(		
		function(){ 		
			json(); 
		}
		);
	});
	
	function genArray()
	{
		
		jQuery.getJSON('json.php', { needGenArray: [true]}, function(obj){	});
		
	}
	
	function onCompleteJSON(lastStart, lastEnd){
		var currentStart,currentEnd; 
		jQuery("#calendars_container").bind('click', function (){json();});
		jQuery('#start').each(function(){
             currentStart=this.value
        });

       jQuery('#end').each(function(){ 
             currentEnd=this.value
       }); 
	   
	   if (((lastStart==currentStart) && (lastEnd==currentEnd)))
			 jQuery("#calendars_container").bind('click', function (){json();});
	    else 		
			json();		
		
	}
  

    function json()
    {
		var MIN_AMOUNT_OF_DATE_STRING = 12;
        var start, end; 

       jQuery('#start').each(function(){ // читаем значение начальной даты
            start=this.value
        });

       jQuery('#end').each(function(){ //  читаем значение конечной даты
            end=this.value
       }); 
	   
	   if ((start.length < MIN_AMOUNT_OF_DATE_STRING) || (end.length < MIN_AMOUNT_OF_DATE_STRING)) 
		{ console.log('can not send');
		  return;
		}
	   
	   jQuery("#calendars_container").unbind('click');
       jQuery.getJSON('json.php', { b: [start],e : [end] }, function(obj){	
			
			jQuery('#main_table').find("tr:gt(0)").remove();
			jQuery(obj).each(function(key, element) {
				  
				jQuery('#main_table').append('<tr> <td><span class="hidden">'+element[0]+' </span> '+element[1]+' </td> <td> '+element[2]+' </td></tr>')
			});
			
		
			jQuery('#main_table').trigger("tableupdate");
			onCompleteJSON(start, end);
        });

		 
    }