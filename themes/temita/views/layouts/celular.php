<html>
	<head>
		<title>Nautilus Solver</title>
                <?php       
	  $baseUrl = Yii::app()->theme->baseUrl;
	  $cs = Yii::app()->getClientScript();
           ?>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<?php 
                
                 $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
	  $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
	 $cs->registerCssFile($baseUrl.'/css/abound.css');
          $cs->registerCssFile($baseUrl.'/css/iconosfuentes.css'); 
         $cs->registerCssFile($baseUrl.'/css/miestilo.css'); 
     
            $cs->scriptMap=array(
                     'jquery-ui.css' => $baseUrl.'/css/jquery-ui.css',
                    'styles.css' => $baseUrl.'/css/styles.css',
                    'pager.css' => $baseUrl.'/css/pager.css',
                                 );
             $cs->registerScriptFile($baseUrl.'/css/jquery-ui.css',CClientScript::POS_HEAD);
                $cs->registerScriptFile($baseUrl.'/js/plugins/blockuiplugin.js',CClientScript::POS_HEAD); 
        
                      
                
                
                
                //$cs->registerScriptFile($baseUrl.'/celular/js/jquery.min.js'); 
                $cs->registerScriptFile($baseUrl.'/celular/js/jquery.dropotron.min.js');
                 $cs->registerScriptFile($baseUrl.'/celular/js/skel.min.js');
                  $cs->registerScriptFile($baseUrl.'/celular/js/skel-layers.min.js');
                 $cs->registerScriptFile($baseUrl.'/celular/js/init.js');
                 $cs->registerScriptFile($baseUrl.'/celular/js/init.js');
                ?>
		<noscript>
                <?php 
                $cs->registerCssFile($baseUrl.'/celular/css/skel.css'); 
                $cs->registerCssFile($baseUrl.'/celular/css/style.css');
                 $cs->registerCssFile($baseUrl.'/celular/css/style-mobile.css'); 
                $cs->registerCssFile($baseUrl.'/celular/css/style-narrow.css');
                $cs->registerCssFile($baseUrl.'/celular/css/style-narrower.css'); 
                $cs->registerCssFile($baseUrl.'/celular/css/style-normal.css');
                 $cs->registerCssFile($baseUrl.'/celular/css/style-wide.css');
                      $cs->registerCssFile($baseUrl.'/css/iconosfuentes.css');
               
                      
                     
                      
                      ?>
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<!-- Header -->
			
				<div class="container">						
					<!-- Logo -->
						<h1><a href="#" id="logo">Embarcaciones</a></h1>
					<!-- Nav -->
						<nav id="nav">
							<ul>
                                                            <li><?php echo CHtml::link('Inicio',yii::app()->createUrl("/operadores/default/Workers"));  ?></li>								
                                                            <li><?php echo CHtml::link('Mis Pendientes',yii::app()->createUrl("/operadores/operaPlanes/revisaPendientes"));  ?></li>
							     <li><a href="right-sidebar.html">Horometro</a></li>
							     <li><?php echo CHtml::link('Cambiar Password',yii::app()->createUrl("/operadores/default/profile"));  ?></li>
							     <li><?php echo CHtml::link('Salir',yii::app()->createUrl("/cruge/ui/logout"));  ?></li>
							
                                                        </ul>
						</nav>


					<!-- Banner -->
						

				</div>
			

		<!-- Featured -->
			

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						
						<span class="byline">Mauris vulputate dolor sit amet nibh</span>
					</header>
					<div class="row">
					
						<!-- Content -->
					<?php echo $content; ?>  		

					</div>
				</section>
			</div>

		<!-- Footer -->
			<div id="footer">
				<div class="container">

					<!-- Lists -->
						<div class="row">
							<div class="8u">
								<section>
									<header class="major">
										<h2>Donec dictum metus</h2>
										<span class="byline">Quisque semper augue mattis wisi maecenas ligula</span>
									</header>
									<div class="row">
										<section class="6u">
											<ul class="default">
												<li><a href="#">Pellentesque elit non gravida blandit.</a></li>
												<li><a href="#">Lorem ipsum dolor consectetuer elit.</a></li>
												<li><a href="#">Phasellus nibh pellentesque congue.</a></li>
												<li><a href="#">Cras vitae metus aliquam  pharetra.</a></li>
											</ul>
										</section>
										<section class="6u">
											<ul class="default">
												<li><a href="#">Pellentesque elit non gravida blandit.</a></li>
												<li><a href="#">Lorem ipsum dolor consectetuer elit.</a></li>
												<li><a href="#">Phasellus nibh pellentesque congue.</a></li>
												<li><a href="#">Cras vitae metus aliquam  pharetra.</a></li>
											</ul>
										</section>
									</div>
								</section>
							</div>
							<div class="4u">
								<section>
									<header class="major">
										<h2>Donec dictum metus</h2>
										<span class="byline">Mattis wisi maecenas ligula</span>
									</header>
									<ul class="contact">
										<li>
											<span class="address">Address</span>
											<span>1234 Somewhere Road #4285 <br />Nashville, TN 00000</span>
										</li>
										<li>
											<span class="mail">Mail</span>
											<span><a href="#">someone@untitled.tld</a></span>
										</li>
										<li>
											<span class="phone">Phone</span>
											<span>(000) 000-0000</span>
										</li>
									</ul>	
								</section>
							</div>
						</div>

					<!-- Copyright -->
						<div class="copyright">
							Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
						</div>

				</div>
			</div>

	</body>
</html>