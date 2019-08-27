/* global $,document,console,quizMaster */
$(document).ready(function() {
	
	$(document).on("pageshow", "#quizPage1", function() {
		console.log("Page show");
		//initialize the quiz
		quizMaster.execute("q2.json", ".quizdisplay", function(result) {
			console.log("SUCESS CB");
			console.dir(result);	
		});
	});

});