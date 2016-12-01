 
<script>
   'use strict';

   $(function() {

    //settings for slider
    var width = 720;
    var animationSpeed = 2000;
    var pause = 3000;
    var currentSlide = 1;

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }

    $slideContainer
    .on('mouseenter', pauseSlider)
    .on('mouseleave', startSlider);

    startSlider();


});

</script>
<style>
    #slider {
        margin-top: 0.5em;
        width: 100%;
        height: 400px;
        overflow: hidden;
        position: fixed;
        top: 25%;
        left: 0%;
    }

    #slider .slides {
        display: block;
        width: 5000px;
        height: 400px;
        margin: 0;
        padding: 0;
    }

    #slider .slide {
        float: left;
        list-style-type: none;
        width: 720px;
        height: 400px;
    }

    /* helper css, since we don't have images */
    .slide1 {background: transparent;}
    .slide2 {background: transparent;}
    .slide3 {background: transparent;}
    .slide4 {background: transparent;}
    .slide5 {background: transparent;}
    .slide6 {background: transparent;}

</style>

<div class='container'>


    <div id='slider'>
        <ul class='slides'>
            <li class='slide slide1'><img src="images/slideshow/pic1.jpg"></li>
            <li class='slide slide2'><img src="images/slideshow/pic2.jpg"></li>
            <li class='slide slide3'><img src="images/slideshow/pic3.jpg"></li>
            <li class='slide slide4'><img src="images/slideshow/pic4.jpg"></li>
            <li class='slide slide5'><img src="images/slideshow/pic5.jpg"></li>
            <li class='slide slide6'><img src="images/slideshow/pic6.jpg"></li>
        </ul>
    </div>

</div>