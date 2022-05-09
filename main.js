


import * as THREE from "three";

//import { OrbitControls } from 'https://unpkg.com/three/examples/jsm/controls/OrbitControls';

		

			let camera, scene;

			let shape;

			const start = Date.now();

			const renderer = new THREE.WebGLRenderer({
				canvas: document.querySelector('#app'),
			  });
		
			init();
			animate();

			function init() {

				camera = new THREE.PerspectiveCamera( 100, window.innerWidth / window.innerHeight, 1, 1000 );
				camera.position.y = 150;
				camera.position.z = 500;

				scene = new THREE.Scene();
				scene.background = new THREE.Color( 0, 0, 0 );

				//const pointLight1 = new THREE.AmbientLight( 0xffffff );
				//scene.add( pointLight1 );

				// SHAPE
				shape = new THREE.Mesh( new THREE.OctahedronGeometry( 100, 2), new THREE.MeshBasicMaterial( { wireframe: true } ) );
				
				scene.add( shape );

				
				renderer.setSize( window.innerWidth, window.innerHeight );

				//const controls =  new OrbitControls(camera, renderer.domElement);
			

				//

				window.addEventListener( 'resize', onWindowResize );

			}
			
			function moveCamera(){
				const t = document.body.getBoundingClientRect().top;

				camera.position.z =  -t *0.101;
				camera.position.x = t *0.015;
				camera.position.y = -t *0.03;
				
			}
			//document.body.onscroll = moveCamera();
			

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );
			

			}

			//

			function animate() {
			
				
				requestAnimationFrame( animate );

				render();

			}

			function render() {

				const timer = Date.now() - start;

				shape.position.y = timer * 0.0001 ;
				shape.rotation.x = timer * 0.0002 ;
				shape.rotation.z = timer * 0.0003 ;
				//controls.update();

				document.body.onscroll = moveCamera();

				renderer.render( scene, camera );

			}