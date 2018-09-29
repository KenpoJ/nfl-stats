$(document).ready(function() {

var mobNav = $('.mobile ul');
var toggle = $('.nav-toggle');
var toggleState = 0;

toggle.click(function() {
	if(toggleState == 0) {
		mobNav.slideDown(300);
		toggleState = 1;
	} else {
		mobNav.slideUp(300);
		toggleState = 0;
	}
});

// DISPLAY HEADING ON THE GAME PAGE
var year = $('#year').val();
var season = $('#season').val();
var week = $('#week').val();
var seasonOutput;

if(season == 'regular') {
	seasonOutput = 'Regular Season';
} else {
	seasonOutput = 'Playoffs'
}

$('.game-heading').text(year + ' ' + seasonOutput + ' - Week ' + week);

})

