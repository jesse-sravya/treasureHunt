$(function(){
	
});

function runScript(e,qNo) {
    if (e.keyCode == 13) {
        SubmitFormData(qNo);
        return false;
    }
}


function updateLevel(levelNo){
	if(levelNo<=7){
		$(".levelList ul").append("<li><a href=\"#question-"+levelNo+"\">"+levelNo+"</a></li>");
	}
	
}

function updateQuestion(qNo,question){
	if(qNo<=7){
		var stringQ = '<div class=" content question-'+qNo+'">';
			stringQ +=  '<h3>level-' +qNo+'<br>'+question+'</h3>';
			stringQ +='<form  id ="myform'+qNo+'"method="post">';
				stringQ +='<input type="hidden" id="input_level'+qNo+'" name="level" value="'+qNo+'">';
				stringQ +='<input type="text" id="input_answer'+qNo+'" name="answer" onkeypress="return runScript(event,'+qNo+')"  placeholder="type your answer here" required>';
				stringQ +='<br><br><input type="button" class="button btn btn-default" id="submitFormData'+qNo+'" onclick="SubmitFormData('+qNo+');" value="Submit" />';
			stringQ +='</form>';
		stringQ +=	'<p id="results'+qNo+'" > </p>';
		stringQ +='</div>';
		$(".wrapper").append(''+stringQ); 
	}
	
}

function SubmitFormData(questionNo) {
    
	var answer = $("#input_answer"+questionNo).val();
    var level = $("#input_level"+questionNo).val();
	
    $.post("submit.php", { answer:answer, level: level},
    function(data) {
		var trimmed_data = $.trim(data);
		
		if(trimmed_data=="correct"){
			$("#results"+questionNo).html("Good job");
			$(".levelList").find("a").eq(questionNo).trigger('click');
		}	
		else if(trimmed_data=="wrong"){
			$("#results"+questionNo).html("Oops! you're wrong");
		}
		else if(trimmed_data=="update level failed"){
			$("#results"+questionNo).html(data);
		}
		else if(trimmed_data=="answer retrieval fail"){
			$("#results"+questionNo).html(data);
		}
		else if(trimmed_data=="update level failed"){
			$("#results"+questionNo).html(data);
		}
		
		else if(trimmed_data=="no more questions"){
			$("#results"+questionNo).html(data);
		}
		
		else if(trimmed_data == "please try again"){
			$("#results"+questionNo).html("something went wrong,please try again");
		}
		
		else if(trimmed_data == "Something went wrong,please try again later"){
			$("#results"+questionNo).html("something went wrong,please try again");
		}
		else if(trimmed_data=="null string"){
			$("#results"+questionNo).html("Oye, type something!");
		}
		else {
			if(questionNo==7){
				$("#results"+questionNo).html("You're done with this round");
				$(".next-round").show();
				
				if ($(".levelList").find('a.next-round-li').length == 0) {
					$(".levelList ul").append("<li><a class=\"item-a next-round-li\" href=\"#next-round\"> &rarr; </a></li>");
					$(".levelList").find("a").each(function() {
							var target = $(this).attr("href").replace("#", "");
							$(this).click(function(e) {
								e.preventDefault();
								
								// Include the jQuery easing plugin (http://gsgd.co.uk/sandbox/jquery/easing/)
								// for extra easing functions like the question-1 below
								$.fn.scrollPath("scrollTo", target, 1000, "easeInOutSine");
							});
						});
						/*------------to scroll to next level -----------------*/
				$(".levelList").find("a").eq(7).trigger('click');
				}
			}
			
				updateLevel(questionNo+1);
				updateQuestion(questionNo+1,trimmed_data);

			
			
				/*--------- adds scrollpath thing to new level ---------------*/
				$(".levelList").find("a").each(function() {
						var target = $(this).attr("href").replace("#", "");
						$(this).click(function(e) {
							e.preventDefault();
							
							// Include the jQuery easing plugin (http://gsgd.co.uk/sandbox/jquery/easing/)
							// for extra easing functions like the question-1 below
							$.fn.scrollPath("scrollTo", target, 1000, "easeInOutSine");
						});
					});
					
				/*------------to scroll to next level -----------------*/
				$(".levelList").find("a").eq(questionNo).trigger('click');	
			
		}
		
	 $('#myform'+questionNo)[0].reset();
	setTimeout(function(){ $("#results"+questionNo).empty("");},1000);
    });
}

