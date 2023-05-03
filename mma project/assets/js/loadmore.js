$(document).ready(function(){
  $(".event-con").slice(0, 3).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".event-con:hidden").slice(0, 1).slideDown();
    if($(".event-con:hidden").length == 0) {
      $("#loadMore").text("No Content").addClass("noContent");
    }
  });
  
})