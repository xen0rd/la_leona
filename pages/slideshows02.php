
<html>
<head>
	<meta charset="UTF-8">
	<title>La Leona Online Resort Reservation</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/slideshow.css" type="text/css">
	<link rel="stylesheet" href="table.css" type="text/css">
	<link rel="stylesheet" href="button.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/ie.css">

<style>
table.room{
    width: 100%;
    border: 0px;
    font-size: 60px;
}
table.room{ th, td { 
    padding:10px;
}
table.room th {
    width:40px;
}
table.lamp {
    width:100%;
    border:1px solid #d4d4d4;
}
table.lamp th, td { 
    padding:10px;
}
table.lamp th {
    width:40px;
}
</style>
<style>
.button {
  border-radius: 4px;
  background-color: #698464;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 15px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  margin-left: 280px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -25px0px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

#tab { display:inline-block; 
       margin-left: 40px; }
.hr{
    width: 600px;
    margin-right: 60px;
}
p{ font-size: 15px}
</style>
</head>

<body>
	<div id="header">
		<div>
			<a href="index.php" class="logo"><img src="logo-trans.png" alt=""></a>
			<form action="index.php">
				<input type="text" name="search" id="search" value="">
				<input type="submit" name="searchBtn" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li class="selected">
					<a href="customer.php">Home</a>
				</li>
					<li>
					<a href="gallerylog.html">Facilities</a>
					<ul>
					<li>
					<a href="bookingevent.php">Amenities</a>
					</li>
				</li>
				</ul>
				<li>
					<a href="slideshows02.php">Gallery</a> 
				<li>
					<a href="#">Reservation</a>
					<ul>
					<li>
					<a href="booking_reservation.php">Booking Reservation</a>
					</li>
					<li>
					<a href="event_reservation.php">Event Reservation</a>
					</li>
					
				<li>
					<a href="manage_reservation.php">Manage Reservation</a>
</li>
</ul>
				<li>
				<a>   User&nbsp;:&nbsp; <?php echo$login_session; ?></a>
					<ul>
					<li>
					<?php 
					echo "<li> <b id='logout'><a href='logout.php'style='text-decoration:none'>Log Out</a></li>"
					?>
					
				
					</li>
               
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="header">
    <script type="text/javascript" src="img2/js/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img2/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('img2/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
        
    </style>

    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #1234e;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/1.png" />
                <img data-u="thumb" src="img2/thumb-1.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/2.png" />
                <img data-u="thumb" src="img2/thumb-2.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/3.png" />
                <img data-u="thumb" src="img2/thumb-3.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/4.png" />
                <img data-u="thumb" src="img2/thumb-4.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/5.png" />
                <img data-u="thumb" src="img2/thumb-5.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery1.png" />
                <img data-u="thumb" src="img2/thumb-gallery1.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery2.png" />
                <img data-u="thumb" src="img2/thumb-gallery2.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery3.png" />
                <img data-u="thumb" src="img2/thumb-gallery3.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery4.png" />
                <img data-u="thumb" src="img2/thumb-gallery4.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery5.png" />
                <img data-u="thumb" src="img2/thumb-gallery5.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery6.png" />
                <img data-u="thumb" src="img2/thumb-gallery6.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery7.png" />
                <img data-u="thumb" src="img2/thumb-gallery7.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery8.png" />
                <img data-u="thumb" src="img2/thumb-gallery8.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery9.png" />
                <img data-u="thumb" src="img2/thumb-gallery9.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery10.png" />
                <img data-u="thumb" src="img2/thumb-gallery10.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery11.png" />
                <img data-u="thumb" src="img2/thumb-gallery11.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery12.png" />
                <img data-u="thumb" src="img2/thumb-gallery12.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery13.png" />
                <img data-u="thumb" src="img2/thumb-gallery13.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery14.png" />
                <img data-u="thumb" src="img2/thumb-gallery14.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery15.png" />
                <img data-u="thumb" src="img2/thumb-gallery15.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery16.png" />
                <img data-u="thumb" src="img2/thumb-gallery16.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery17.png" />
                <img data-u="thumb" src="img2/thumb-gallery17.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery18.png" />
                <img data-u="thumb" src="img2/thumb-gallery18.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery19.png" />
                <img data-u="thumb" src="img2/thumb-gallery19.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery20.png" />
                <img data-u="thumb" src="img2/thumb-gallery20.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery21.png" />
                <img data-u="thumb" src="img2/thumb-gallery21.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/hall1.png" />
                <img data-u="thumb" src="img2/thumb-hall1.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/hall2.png" />
                <img data-u="thumb" src="img2/thumb-hall2.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/le leona cabana.png" />
                <img data-u="thumb" src="img2/thumb-le leona cabana.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/mezaninne1.png" />
                <img data-u="thumb" src="img2/thumb-mezaninne1.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/mushroom1.png" />
                <img data-u="thumb" src="img2/thumb-mushroom1.png" />
            </div>
             <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/mushroom2.png" />
                <img data-u="thumb" src="img2/thumb-mushroom2.png" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img2/gallery17.png" />
                <img data-u="thumb" src="img2/thumb-gallery17.png" />
            </div>


        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
        <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
    <!-- #endregion Jssor Slider End -->	
</div>
	
	<div id="footer">
		<div>
			<div class="contact">
				<h3>contact information</h3>
				<ul>
					<li>
						<b>address:</b> <span>Brgy. Sampaguita, Lipa City, Batangas</span>
					</li>
					<li>
						<b>landline:</b> <span>(043) 784-0153</span>
					</li>
					<li>
						<b>mobile:</b> <span>09175048667</span>
					</li>
					
				</ul>
			</div>
			<div class="tweets">
				<h3>recent tweets</h3>
				<ul>
					<li>
						<a href="https://www.twitter.com/@FIMejico">We’re officially welcoming summer 2012! And with that, here are the new and updated rates here in La Leona Resort. Enjoy your vacation with us and have loads of fun here for a memorable summer.<span>1 day ago</span></a>
					</li>
				</ul>
			</div>
			<div class="posts">
				<h3>News</h3>
				<ul>
					<li>
						<a href="https://www.laleonaresort.net/">La Leona Resort is now Online!</a>
					</li>
				</ul>
			</div>
			<div class="connect">
				<h3>stay in touch</h3>
				<p>
					Are you in search for the best venue for your event? Why not celebrate birthdays, reunions, anniversaries, and weddings or conduct corporate events like team building, seminars, fora and business meetings at La Leona Resort
				</p>
				<ul>
					<li id="facebook">
						<a href="https://www.facebook.com/">facebook</a>
					</li>
					<li id="twitter">
						<a href="https://www.twitter.com/">twitter</a>
					</li>
					<li id="googleplus">
						<a href="https://www.plus.google.com/">googleplus</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="section">
			<p>
				&copy; this is the copyright area
			</p>
	
		</div>
	</div>


</body>
</html>