<html>
    <head>
         <title>Wichtelbastard</title>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	    
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
        <!-- Latest compiled and minified JavaScript -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="http://animate.adobe.com/runtime/6.0.0/edge.6.0.0.min.js"></script>
        <!--Own Styles -->
        <link rel="stylesheet" type="text/css" href="<?=$root?>css/style.css">
        <script type="text/javascript" src="<?=$root?>js/main.js"></script>
     
     	<script type="text/javascript" src="<?=$root?>js/jquery.snow.js"></script>
        <script>
        	jQuery(function() {
				jQuery("body").snow({
					intensity: 40,
					sizeRange: [5, 25],
					opacityRange: [0.4, 1],
					driftRange: [10, 10],
					speedRange: [55, 120]
				});
			});
			
        </script>
     
     <!--   
     	<script type="text/javascript" src="<?=$root?>js/ThreeCanvas.js"></script> 
     	<script type="text/javascript" src="<?=$root?>js/Snow.js"></script>
	
		<script>

			var SCREEN_WIDTH = window.innerWidth;
			var SCREEN_HEIGHT = window.innerHeight;

			var container;

			var particle;

			var camera;
			var scene;
			var renderer;

			var mouseX = 0;
			var mouseY = 0;

			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;
			
			var particles = []; 
			var particleImage = new Image();//THREE.ImageUtils.loadTexture( "img/ParticleSmoke.png" );
			particleImage.src = '<?=$root?>img/ParticleSmoke.png'; 

		
		
			function init() {

				container = document.createElement('div');
				document.body.appendChild(container);

				camera = new THREE.PerspectiveCamera( 75, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 10000 );
				camera.position.z = 1000;

				scene = new THREE.Scene();
				scene.add(camera);
					
				renderer = new THREE.CanvasRenderer();
				renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
				var material = new THREE.ParticleBasicMaterial( { map: new THREE.Texture(particleImage) } );
					
				for (var i = 0; i < 500; i++) {

					particle = new Particle3D( material);
					particle.position.x = Math.random() * 2000 - 1000;
					particle.position.y = Math.random() * 2000 - 1000;
					particle.position.z = Math.random() * 2000 - 1000;
					particle.scale.x = particle.scale.y =  1;
					scene.add( particle );
					
					particles.push(particle); 
				}

				container.appendChild( renderer.domElement );

	
				document.addEventListener( 'mousemove', onDocumentMouseMove, false );
				document.addEventListener( 'touchstart', onDocumentTouchStart, false );
				document.addEventListener( 'touchmove', onDocumentTouchMove, false );
				
				setInterval( loop, 5000 / 120 );
				
			}
			
			function onDocumentMouseMove( event ) {

				mouseX = event.clientX - windowHalfX;
				mouseY = event.clientY - windowHalfY;
			}

			function onDocumentTouchStart( event ) {

				if ( event.touches.length == 1 ) {

					event.preventDefault();

					mouseX = event.touches[ 0 ].pageX - windowHalfX;
					mouseY = event.touches[ 0 ].pageY - windowHalfY;
				}
			}

			function onDocumentTouchMove( event ) {

				if ( event.touches.length == 1 ) {

					event.preventDefault();

					mouseX = event.touches[ 0 ].pageX - windowHalfX;
					mouseY = event.touches[ 0 ].pageY - windowHalfY;
				}
			}

			//

			function loop() {

			for(var i = 0; i<particles.length; i++)
				{

					var particle = particles[i]; 
					particle.updatePhysics(); 
	
					with(particle.position)
					{
						if(y<-1000) y+=2000; 
						if(x>1000) x-=2000; 
						else if(x<-1000) x+=2000; 
						if(z>1000) z-=2000; 
						else if(z<-1000) z+=2000; 
					}				
				}
			
				camera.position.x += ( mouseX - camera.position.x ) * 0.05;
				camera.position.y += ( - mouseY - camera.position.y ) * 0.05;
				camera.lookAt(scene.position); 

				renderer.render( scene, camera );

				
			}

		</script>
		-->
           <style>
            .edgeLoad-EDGE-20128410 { visibility:hidden; }
        </style>
    <script>
       AdobeEdge.loadComposition('wichtelbastard', 'EDGE-20128410', {
        scaleToFit: "width",
        centerStage: "none",
        minW: "0px",
        maxW: "undefined",
        width: "700px",
        height: "250px"
    }, {"dom":{}}, {"dom":{}});
    </script>
    </head>

    <!-- <body onload="init()"> -->
    <body>
	<div id="snow"></div>
    <div class="header">
     <div class="bastard">
          <div id="Stage" class="EDGE-20128410">
        </div>
      </div>
      <?
        require_once($documentRoot."/lib/login.php")
      ?>
   </div>
   <div id="content">
       <div class="container">
