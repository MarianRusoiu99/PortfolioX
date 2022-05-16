


import * as THREE from "three";

import { OrbitControls } from 'https://unpkg.com/three/examples/jsm/controls/OrbitControls';
import { ImprovedNoise } from 'https://unpkg.com/three/examples/jsm/math/ImprovedNoise.js';
		
			const camposx = -2000 , camposy = 1000 , camposz = 100 ;
		
			let camera, scene;

			var controls;
		
			const worldWidth = 256, worldDepth = 256;
		
			const start = Date.now();

			const renderer = new THREE.WebGLRenderer({
				canvas: document.querySelector('#app'),
			  });
		
			init();
		
			animate();

			function init() {

				camera = new THREE.PerspectiveCamera( 100, window.innerWidth / window.innerHeight, 1, 000 );
		
			
				camera.position.x = camposx;
				camera.position.y = camposy;
				camera.position.z = camposz;
				

				

			//	camera.rotation.x = -45;
			//	camera.rotation.z = 45;
			//	camera.rotation.z = 10;

				scene = new THREE.Scene();

				scene.background = new THREE.Color( 0, 0, 0 );

				//scene.fog = new THREE.FogExp2( 0xefd1b5, 0.0025 );
				
				const data = generateHeight( worldWidth, worldDepth );

				const light = new THREE.AmbientLight( 0x404040 ); // soft white light
				scene.add( light );
				
				// SHAPE
				const geometry = new THREE.PlaneGeometry( 7500, 7500, worldWidth - 1, worldDepth - 1 );
				//geometry.rotateX( - Math.PI / 2 );
				
				const vertices = geometry.attributes.position.array;

				for ( let i = 0, j = 0, l = vertices.length; i < l; i ++, j += 3 ) {

					vertices[ j + 1 ] = data[ i ] * 10;

				}

				const mesh = new THREE.Mesh( geometry, new THREE.MeshBasicMaterial( { wireframe: true } ) );
				scene.add( mesh );
				
				renderer.setSize( window.innerWidth, window.innerHeight );

				

				//
				
				controls = new OrbitControls( camera, renderer.domElement );
			//	controls.update();
				controls.enablePan = false;
				controls.enableDamping = true;
				controls.addEventListener('change',render);


				window.addEventListener( 'resize', onWindowResize );

			}
			
			// function moveCamera(){
			// 	const t = document.body.getBoundingClientRect().top;

			// 	camera.position.z = camposz + t *0.01;
			// 	camera.position.x = camposx + t *0.015;
			// 	camera.position.y = camposz -t *0.03;
				
			// }
			
			
			function generateHeight( width, height ) {

				let seed = Math.PI / 4;
				window.Math.random = function () {

					const x = Math.sin( seed ++ ) * 10000;
					return x - Math.floor( x );

				};

				const size = width * height, data = new Uint8Array( size );

				const perlin = new ImprovedNoise(), z = Math.random() * 100;

				let quality = 2;

				for ( let j = 0; j < 4; j ++ ) {

					for ( let i = 0; i < size; i ++ ) {

						const x = i % width, y = ~ ~ ( i / width );
						data[ i ] += Math.abs( perlin.noise( x / quality, y / quality, z ) * quality * 1.75 );

					}

					quality *= 5;

				}

				return data;

			}
			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

  			function animate() {
			
				
				requestAnimationFrame( animate );
				controls.update();
				render();

			}

			function render() {

				const timer = Date.now() - start;
				//document.body.onscroll = moveCamera();
				
				renderer.render( scene, camera );

			}