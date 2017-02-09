
<style>
.mySlides {
    display:none;
    height: 400px;
    width: 100%;
}
.w3-content{
    margin-left: 0;
}
.w3-section{
    margin-top:16px!important;
    margin-bottom:16px!important;
}
.newhold{
    width: 100%;
    height: inherit;
    background-color: black;
    color: white;
    text-align: center;
    text-transform: capitalize;
}
.innerbox{
    width: 33.33333333333333%;
    background-color: red;
    height: 250px;
    float: left;
    color: black;
    overflow: hidden;
}
h1{
    color: black;
    background-color: white;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;

}
@media only screen and (max-width: 768px) {
    .mySlides{
    display:none;
    height: 150px;
    width: 100%;
}
.innerbox{
    width: 100%;
}
h1{
    font-size: 1em;
}

}


</style>
<body>


<div class="w3-content w3-section" style="width: 100%;">
  <img class="mySlides" src="images/slideshow/pic1.jpg">
  <img class="mySlides" src="images/slideshow/pic2.jpg">
  <img class="mySlides" src="images/slideshow/pic3.jpg">
  <img class="mySlides" src="images/slideshow/pic4.jpg">
  <img class="mySlides" src="images/slideshow/pic5.jpg">
  <img class="mySlides" src="images/slideshow/pic6.jpg">
  <img class="mySlides" src="images/slideshow/pic7.jpg">
  <img class="mySlides" src="images/slideshow/pic8.jpg">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500); // Change image speed
}
</script>
<div class="newhold">
<div class="innerbox">
   <h1>maybe we</h1>
   ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<div class="innerbox">
    <h1>should put</h1>
    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<div class="innerbox">
    <h1>somthing here?</h1>
    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<div class="newhold">
<div class="innerbox">
   <h1>and maybe</h1>
   ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<div class="innerbox">
    <h1>change the </h1>
    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<div class="innerbox">
    <h1>colour?</h1>
    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>

</div>


