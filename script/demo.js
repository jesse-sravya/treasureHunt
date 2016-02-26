$(document).ready(init);

function init() {

	/* ========== DRAWING THE PATH AND INITIATING THE PLUGIN ============= */

	$.fn.scrollPath("getPath")

		.moveTo(400, 50, {name: "question-1"})
		.lineTo(400, 800, {name: "question-2"})
		.arc(200, 1200, 400, -Math.PI/2, Math.PI/2, true)
		.lineTo(600, 1600, {
			callback: function() {
				highlight($(".settings"));
			},
			name: "question-3"
		})
		.lineTo(1750, 1600, {
			callback: function() {
				highlight($(".sp-scroll-handle"));
			},
			name: "question-4"
		})
		.arc(1800, 1000, 600, Math.PI/2, 0, true, {rotate: Math.PI/2 })
		.lineTo(2400, 750, {
			name: "question-5"
		})
		.rotate(3*Math.PI/2, {
			name: "question-5-rotated"
		})
		.lineTo(2400, -700, {
			name: "question-6"
		})
		.arc(2250, -700, 150, 0, -Math.PI/2, true)
		.lineTo(1350, -850, {
			name: "question-7"
		})
		.lineTo( 720, -639, {
			name: "next-round"
		})
		.arc(1300, 50, 900, -(13/9)*Math.PI/2, -Math.PI, true, {rotate: Math.PI*2, name: "end"});
		
		
	// We're dquestion-1 with the path, let's initate the plugin on our wrapper element
	$(".wrapper").scrollPath({drawPath: true, wrapAround: true});

	// Add scrollTo on click on the navigation anchors
	$(".levelList").find("a").each(function() {
		var target = $(this).attr("href").replace("#", "");
		$(this).click(function(e) {
			e.preventDefault();
			
			// Include the jQuery easing plugin (http://gsgd.co.uk/sandbox/jquery/easing/)
			// for extra easing functions like the question-1 below
			$.fn.scrollPath("scrollTo", target, 1000, "easeInOutSine");
		});
	});
	
	
	/* ===================================================================== */


	$.getJSON("http://cdn.api.twitter.com/1/urls/count.json?callback=?&url=http%3A%2F%2Fjoelb.me%2Fscrollpath",
			function(data) {
				if(data && data.count !== undefined) {
					$(".follow .count").html("the " + ordinal(data.count + 1) + " kind person to");
				}
			});
	}


function highlight(element) {
	if(!element.hasClass("highlight")) {
		element.addClass("highlight");
		setTimeout(function() { element.removeClass("highlight"); }, 2000);
	}
}
function ordinal(num) {
	return num + (
		(num % 10 == 1 && num % 100 != 11) ? 'st' :
		(num % 10 == 2 && num % 100 != 12) ? 'nd' :
		(num % 10 == 3 && num % 100 != 13) ? 'rd' : 'th'
	);
}
