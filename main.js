import * as THREE from "three";

import {
    OrbitControls
} from 'https://unpkg.com/three/examples/jsm/controls/OrbitControls';
import {
    SimplexNoise
} from 'https://unpkg.com/simplex-noise@3.0.1/dist/esm/simplex-noise.js';



const camposx = 0,
    camposy = 100,
    camposz = 250;



let camera, scene, number, geometry;

var controls, seed=0;


const start = Date.now();

const renderer = new THREE.WebGLRenderer({
    canvas: document.querySelector('#app'),
});

var vertexHeight = 15000,
    planeDefinition = 50,
    planeSize = 2000;




init();

animate();

function init() {

    camera = new THREE.PerspectiveCamera(100, window.innerWidth / window.innerHeight, 1, 10000);


    camera.position.x = camposx;
    camera.position.y = camposy;
    camera.position.z = camposz;

    scene = new THREE.Scene();

    scene.background = new THREE.Color(0, 0, 0);

    scene.fog = new THREE.FogExp2(0x000000, 0.0045);



    const light = new THREE.AmbientLight(0x404040); // soft white light
    scene.add(light);

    // SHAPE
    geometry = new THREE.PlaneBufferGeometry(planeSize, planeSize, planeDefinition, planeDefinition);
    var plane = new THREE.Mesh(geometry, new THREE.MeshBasicMaterial({
        wireframe: true
    }));
    plane.rotation.x -= Math.PI * 0.5;
    plane.rotation.z -= Math.PI/6;

    scene.add(plane);

    number = geometry.attributes.position.count;



    renderer.setSize(window.innerWidth, window.innerHeight);


   
    //render();



    //

    controls = new OrbitControls(camera, renderer.domElement);
    //	controls.update();
    controls.enablePan = false;
    controls.enableDamping = true;



    window.addEventListener('resize', onWindowResize);

}

// function moveCamera(){
// 	const t = document.body.getBoundingClientRect().top;

// 	camera.position.z = camposz + t *0.01;
// 	camera.position.x = camposx + t *0.015;
// 	camera.position.y = camposz -t *0.03;

// }



function onWindowResize() {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize(window.innerWidth, window.innerHeight);

}


// function generateTerrain()
// {
//     var perlin = new SimplexNoise();

//     var data[number] = [];
//     for(var i = 0; i < number ; i++){
//         data[i]= perlin.noise2D(1,2);
//     }
// }



function sleep(milliseconds) {
    const date = Date.now();
    let currentDate = null;
    do {
      currentDate = Date.now();
    } while (currentDate - date < milliseconds);
  }


  function terrainMovement()
  {
    
    var time = Date.now()/3000;

    var xof = 0;
    var yof = 0;
    var zof = 0;
    for(var i = 0; i < number ; i++){
        
        xof +=0.01;
        yof +=0.01;
        zof +=0.01;
        var x = geometry.attributes.position.getX(i);
        var y = geometry.attributes.position.getY(i);
        var z = geometry.attributes.position.getZ(i);
        
        geometry.attributes.position.setZ(i,Math.sin(x*y+time)*20);
        geometry.attributes.position.needsUpdate = true;
      
    }
   
    

  }


function animate() {


    //    requestAnimationFrame(render);
    
    
    seed +=0.0000000000001;
    terrainMovement();
  //  sleep(1000);
    requestAnimationFrame(animate);
    controls.update();
    render();
}


function render() {


    renderer.render(scene, camera);

}