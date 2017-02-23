$(document).ready(function(){
	$('.html').animate({width: '90%'},6000);
	$('.php').animate({width: '75%'},6000);
	$('.js').animate({width: '75%'},6000);
	$('.photoshop').animate({width: '65%'},6000);

	$('#arrow, .skills, #submit').mouseenter(function() {
       $(this).animate({
           height: '+=10px'
       });
   });
   $('#arrow, .skills, #submit').mouseleave(function() {
       $(this).animate({
           height: '-=10px'
       }); 
   });
});