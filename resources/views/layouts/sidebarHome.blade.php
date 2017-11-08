<!DOCTYPE html>
<html lang="en">
<head>
    <title>PEGADAIAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Best Pets Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="{{url('home/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{url('home/css/style.css')}}" type="text/css" rel="stylesheet" media="all">   
    <link href="{{url('home/css/font-awesome.css')}}" rel="stylesheet"> <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{url('home/css/flexslider.css')}}" type="text/css" media="screen" property="" />
    <!-- //Custom Theme files -->  
    <!-- web-fonts -->   
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //web-fonts -->
</head>
<body> 
    <!-- banner -->
    <div class="w3ls-banner jarallax">
        <div class="w3lsbanner-info">
            <!-- header -->
            <div class="header">
                <div class="container">   
                    <div class="agile_header_grid"> 
                        <div class="header-mdl agileits-logo"><!-- header-two --> 
                            <h1><a href="index.html">PEGADAIAN</a></h1> 
                        </div>
                        <div class="agileits_w3layouts_sign_in">
                            <ul>
                                <li><a href="#myModal2" data-toggle="modal" class="play-icon">Login</a></li>
                                <li><span>TRPL 1C</span></li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div> 
                    <div class="header-nav"><!-- header-three -->   
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button> 
                            </div>
                        </nav>    
                    </div>  
                </div>  
            </div> 

            @yield('content')

                    <script src="{{url('home/js/jquery-2.2.3.min.js')}}"></script>  
                    <!-- //js -->  
                    <!-- jarallax -->  
                    <script src="{{url('home/js/SmoothScroll.min.js')}}"></script> 
                    <script src="{{url('home/js/jarallax.js')}}"></script> 
                    <script type="text/javascript" src="{{url('assets/js/swal.js')}}"></script>
                    <script type="text/javascript">
                        /* init Jarallax */
                        $('.jarallax').jarallax({
                            speed: 0.5,
                            imgWidth: 1366,
                            imgHeight: 768
                        })
                    </script>  
                    <!-- //jarallax -->
                    <!-- ResponsiveTabs js -->
                    <script src="{{url('home/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true   // 100% fit in a container
            });
                        });
                    </script>
                    <!-- //ResponsiveTabs js -->  
                    <!-- banner-type-text -->
                    <script src="{{url('home/js/typed.js')}}" type="text/javascript"></script>
                    <script>
                        $(function(){

                            $("#typed").typed({
                // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
                stringsElement: $('#typed-strings'),
                typeSpeed: 30,
                backDelay:700,
                loop: true,
                contentType: 'html', // or text
                // defaults to false for infinite loop
                loopCount: false,
                callback: function(){ foo(); },
                resetCallback: function() { newTyped(); }
            });

                            $(".reset").click(function(){
                                $("#typed").typed('reset');
                            });

                        }); 
                    function newTyped(){ /* A new typed object */ }

                    function foo(){ console.log("Callback"); }
                </script>
                <!-- //banner-type-text -->
                <!-- flexSlider -->
                <script defer src="{{url('home/js/jquery.flexslider.js')}}"></script>
                <script type="text/javascript">
                    $(window).load(function(){
                      $('.flexslider').flexslider({
                        animation: "slide",
                        start: function(slider){
                          $('body').removeClass('loading');
                      }
                  });
                  });
              </script>
              <!-- //flexSlider --> 
              <!-- start-smooth-scrolling -->
              <script type="text/javascript" src="{{url('home/js/move-top.js')}}"></script>
              <script type="text/javascript" src="{{url('home/js/easing.js')}}"></script> 
              <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $(".scroll").click(function(event){     
                        event.preventDefault();

                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                    });
                });
            </script>
            <!-- //end-smooth-scrolling --> 
            <!-- smooth-scrolling-of-move-up -->
            <script type="text/javascript">
                $(document).ready(function() {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */
            
            $().UItoTop({ easingType: 'easeOutQuart' });
            
        });
    </script>
    <!-- //smooth-scrolling-of-move-up --> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{url('home/js/bootstrap.js')}}"></script>
    @extends('pesan')
</body>
</html>