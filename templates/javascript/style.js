      // Menu-toggle button

      $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      });
	  $(function(){
    var heroImage = $("#hero1").data("image");
    $("#hero1").css("backgroundImage","url('assets/"+heroImage+"')");
  });
  $(function(){
    var heroImage = $("#hero").data("image");
    $("#hero").css("backgroundImage","url('assets/"+heroImage+"')");
  });
    $(function(){
    var heroImage = $("#hero3").data("image");
    $("#hero3").css("backgroundImage","url('assets/"+heroImage+"')");
  });



