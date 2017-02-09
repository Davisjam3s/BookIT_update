function ContactScript() 
	{
   	$(".box_top_left").hide();
		$(".box_top_right").hide();
   	$(".box_bottom_left").hide();
		$(".box_bottom_right").hide();
   	$(".box_ContactEmail").show();
   	$(".box_Contact_form").show();
   	$(".box_Contact_back").show();
	}
function Contact_back()
	{
		$(".box_top_left").show();
  		$(".box_top_right").show();
		$(".box_bottom_left").show();
		$(".box_bottom_right").show();
		$(".box_ContactEmail").hide();
   	$(".box_Contact_form").hide();
   	$(".box_Contact_back").hide();
	}
function Login_display()
   {
      $(".box_top_left").hide();
      $(".box_top_right").hide();
      $(".box_bottom_left").hide();
      $(".box_bottom_right").hide();
      $(".login_form").show();
      $(".box_login_back").show();
      $(".menu_container_background").animate({height: '32vmin', width: '55vmin'});
      $(".menu_container").animate({height: '32vmin', width: '55vmin'});
   }
function login_back() 
{
   $(".box_top_left").show();
      $(".box_top_right").show();
      $(".box_bottom_left").show();
      $(".box_bottom_right").show();
      $(".login_form").hide();
      $(".box_login_back").hide();
      $(".menu_container_background").animate({height: '25vmin', width: '50vmin'});
      $(".menu_container").animate({height: '25vmin', width: '50vmin'});
}
function Register_display()
   {
      $(".box_top_left").hide();
      $(".box_top_right").hide();
      $(".box_bottom_left").hide();
      $(".box_bottom_right").hide();
      $(".register_form").show();
      $(".box_register_back").show();
      $(".menu_container_background").animate({height: '77vmin', width: '55vmin'});
      $(".menu_container").animate({height: '77vmin', width: '55vmin'});
   }
function Register_back()
   {
      $(".box_top_left").show();
      $(".box_top_right").show();
      $(".box_bottom_left").show();
      $(".box_bottom_right").show();
      $(".register_form").hide();
      $(".box_register_back").hide();
      $(".menu_container_background").animate({height: '25vmin', width: '50vmin'});
      $(".menu_container").animate({height: '25vmin', width: '50vmin'});
   }

