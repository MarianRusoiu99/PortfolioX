


import * as THREE from "three";

			
		

			let camera, scene, renderer	;

			let shape;

			const start = Date.now();

			init();
			animate();

			function init() {

				camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 1, 1000 );
				camera.position.y = 150;
				camera.position.z = 500;

				scene = new THREE.Scene();
				scene.background = new THREE.Color( 0, 0, 0 );

				const pointLight1 = new THREE.AmbientLight( 0xffffff );
				scene.add( pointLight1 );

				// SHAPE
				shape = new THREE.Mesh( new THREE.OctahedronGeometry( 250, 5), new THREE.MeshBasicMaterial( { wireframe: true } ) );
				scene.add( shape );

				renderer = new THREE.WebGLRenderer();
				renderer.setSize( window.innerWidth, window.innerHeight );

			//	document.body.appendChild( renderer.domElement );
				document.getElementById("app").appendChild( renderer.domElement );

			

				//

				window.addEventListener( 'resize', onWindowResize );

			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );
			//	effect.setSize( window.innerWidth, window.innerHeight );

			}

			//

			function animate() {

				requestAnimationFrame( animate );

				render();

			}

			function render() {

				const timer = Date.now() - start;

				shape.position.y = timer * 0.0004;
				shape.rotation.x = timer * 0.0004;
				shape.rotation.z = timer * 0.0004;

				

				renderer.render( scene, camera );

			}