


import * as THREE from "three";

//import { OrbitControls } from 'https://unpkg.com/three/examples/jsm/controls/OrbitControls';
import { ImprovedNoise } from 'https://unpkg.com/three/examples/jsm/math/ImprovedNoise.js';
		

			let camera, scene;
			const worldWidth = 256, worldDepth = 256;
		//	let shape;
			const clock = new THREE.Clock();

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
				scene.fog = new THREE.FogExp2( 0xefd1b5, 0.0025 );
				const data = generateHeight( worldWidth, worldDepth );

				const light = new THREE.AmbientLight( 0x404040 ); // soft white light
				scene.add( light );
				// SHAPE
				const geometry = new THREE.PlaneGeometry( 7500, 7500, worldWidth - 1, worldDepth - 1 );
				geometry.rotateX( - Math.PI / 2 );
				
				const vertices = geometry.attributes.position.array;

				for ( let i = 0, j = 0, l = vertices.length; i < l; i ++, j += 3 ) {

					vertices[ j + 1 ] = data[ i ] * 10;

				}

				const mesh = new THREE.Mesh( geometry, new THREE.MeshBasicMaterial( { wireframe: true } ) );
				scene.add( mesh );
				
				renderer.setSize( window.innerWidth, window.innerHeight );

				//const controls =  new OrbitControls(camera, renderer.domElement);
			

				//

				window.addEventListener( 'resize', onWindowResize );

			}
			
			function moveCamera(){
				const t = document.body.getBoundingClientRect().top;

				camera.position.z =  -t *0.101;
				camera.position.x = -1000 + t *0.015;
				camera.position.y = -t *0.03;
				
			}
			//document.body.onscroll = moveCamera();
			
			function generateHeight( width, height ) {

				let seed = Math.PI / 4;
				window.Math.random = function () {

					const x = Math.sin( seed ++ ) * 10000;
					return x - Math.floor( x );

				};

				const size = width * height, data = new Uint8Array( size );
				const perlin = new ImprovedNoise(), z = Math.random() * 100;

				let quality = 1;

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

			//

			function animate() {
			
				
				requestAnimationFrame( animate );

				render();

			}

			function render() {

				const timer = Date.now() - start;

				// shape.position.y = timer * 0.0001 ;
				// shape.rotation.x = timer * 0.0002 ;
				// shape.rotation.z = timer * 0.0003 ;
				//controls.update();

				document.body.onscroll = moveCamera();

				renderer.render( scene, camera );

			}