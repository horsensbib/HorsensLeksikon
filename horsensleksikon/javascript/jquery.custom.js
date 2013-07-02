$(document).ready(function(){
	$("#toolbox").addClass("hidden");
	$("#toolstab p").click(function () {
		if ($("#toolbox").is(":hidden")) {
			$("#toolbox").slideDown("slow");
		} else {
			$("#toolbox").slideUp("slow");
		}
	});
	$("#toolbox small span").click(function () {
		$("#toolbox").slideToggle("slow");
  });
	$("div.artikel-rokade").corner("br tr 5px");
	$("div#sitename").corner("br tr 3px");
	$("div#usertools").corner("bl tl 3px");
	$("div#views li.selected").corner("cc:#fff 3px");
	$("div#toolstab p").corner("cc:#fff 3px");
});