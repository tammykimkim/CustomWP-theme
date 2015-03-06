$(function(){
	  
	// $( ".clickme" ).click(function() {
	//   $( ".top-hidden-menu" ).toggleClass('display');
	// });

var option = { direction: "down" };

      $(".clickme").click(function (e) {
        e.preventDefault(); 
        $('.top-hidden-menu').toggle("slide", option, 500);
  });

}); // end document ready
