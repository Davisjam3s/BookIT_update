$(document).ready(function() // wait till the page is ready
{
    $(".Control").click(function() // wait till this button has been pressed
      {
          $(".mainnav").show(); // show the main nav
          $(".adminnav").hide(); // hide this nav
          $("p").hide(); // hide the paragraph
          $("Title").text("BookIT|Admin|Control"); // change the title
          $(".holder").show(); // show the holder
          $(".holder").load("ajax/Pages/Admin/Control.php"); // load the control.php page
      });
  });
$(document).ready(function()
{
    $(".Manage").click(function()
      {
          $(".mainnav").show();
          $(".adminnav").hide();
          $("p").hide();
          $("Title").text("BookIT|Admin|Manage");
          $(".holder").show();
          $(".holder").load("ajax/Pages/Admin/Manage.php"); // load the manage.php page
      });
  });