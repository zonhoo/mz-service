 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">

 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 	<meta name="keyword" content="慕庄，石家庄，石家庄本地生活指南" />
 	<meta name="description" content="慕庄APP，石家庄本地生活指南" />
 	<meta name="author" content="石家庄荣朋科技" />

 	<title>Xenon - Profile</title>

 	{!! Html::style('http://fonts.useso.com/css?family=Arimo:400,700,400italict') !!}
    {!! Html::style('style/assets/css/fonts/linecons/css/linecons.css') !!}
    {!! Html::style('style/assets/css/fonts/linecons/css/linecons.css') !!}
    {!! Html::style('style/assets/css/fonts/fontawesome/css/font-awesome.min.css') !!}
    {!! Html::style('style/assets/css/bootstrap.css') !!}
    {!! Html::style('style/assets/css/xenon-core.css') !!}
    {!! Html::style('style/assets/css/xenon-forms.css') !!}
    {!! Html::style('style/assets/css/xenon-components.css') !!}
    {!! Html::style('style/assets/css/xenon-skins.css') !!}
    {!! Html::style('style/assets/css/custom.css') !!}

    {!! Html::script('style/assets/js/jquery-1.11.1.min.js') !!}

 	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 	<!--[if lt IE 9]>
 		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 	<![endif]-->


 </head>
 <body class="page-body">


 	<div class="page-container">
 		<div class="main-content">
            @yield('title')

            @yield('main')



 			<!-- Main Footer -->
 			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
 			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
 			<!-- Or class "fixed" to  always fix the footer to the end of page -->
 			<footer class="main-footer sticky footer-type-1">

 				<div class="footer-inner">

 					<!-- Add your copyright text here -->
 					<div class="footer-text">
 						&copy; 2015
 						<strong>慕庄</strong>
 						design by <a href="http://zonhoo.cn" target="_blank">荣鹏科技</a>
 					</div>


 					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
 					<div class="go-up">

 						<a href="#" rel="go-top">
 							<i class="fa-angle-up"></i>
 						</a>

 					</div>

 				</div>

 			</footer>
 		</div>



 	</div>


    <!--Import styles on this page-->
    @yield('style')

	<!-- Bottom Scripts -->
    {!! Html::script('style/assets/js/bootstrap.min.js') !!}
    {!! Html::script('style/assets/js/TweenMax.min.js') !!}
    {!! Html::script('style/assets/js/resizeable.js') !!}
    {!! Html::script('style/assets/js/joinable.js') !!}
    {!! Html::script('style/assets/js/xenon-api.js') !!}
    {!! Html::script('style/assets/js/xenon-toggles.js') !!}

    <!--Import script on this page-->
    @yield('script')

	<!-- JavaScripts initializations and stuff -->
    {!! Html::script('style/assets/js/xenon-custom.js') !!}

 </body>
 </html>