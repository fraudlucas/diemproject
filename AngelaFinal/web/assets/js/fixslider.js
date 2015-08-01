$(document).on(".ui-page", "pageinit", function() {
  var $page = $(this);
  $page.find('.flexslider').flexslider({
    smoothHeight: "true",
    animation: "slide",
  });
});
