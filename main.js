import * as THREE from "three";

import {
    OrbitControls
} from 'https://unpkg.com/three/examples/jsm/controls/OrbitControls';



const camposx = 0,
    camposy = 250,
    camposz = 250;



let camera, scene, number, geometry;

var controls;




const renderer = new THREE.WebGLRenderer({
    canvas: document.querySelector('#app'),
});





var vertexHeight = 15000,
    planeDefinition = 300,
    planeSize = 30000;




init();

animate();

function init() {

    camera = new THREE.PerspectiveCamera(100, window.innerWidth / window.innerHeight, 1, 10000);
    camera.position.x = camposx;
     camera.position.y =  camposy;
      camera.position.z = camposz;

    
    scene = new THREE.Scene();
  
    scene.background = new THREE.Color(0x191919);

    scene.fog = new THREE.FogExp2(0x191919, 0.0025);




    // SHAPE
    geometry = new THREE.PlaneBufferGeometry(planeSize, planeSize, planeDefinition, planeDefinition);
    var plane = new THREE.Mesh(geometry, new THREE.MeshBasicMaterial({
        wireframe: true, color:0xE6E6E6 
    }));
    plane.rotation.x -= Math.PI / 2;
    plane.rotation.z -= Math.PI / 7;
    

    scene.add(plane);

    number = geometry.attributes.position.count;

    






    renderer.setSize(window.innerWidth, window.innerHeight);


    controls = new OrbitControls(camera, renderer.domElement);

    controls.enablePan = false;
    controls.enableDamping = true;



    window.addEventListener('resize', onWindowResize);


    

}




function onWindowResize() {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize(window.innerWidth, window.innerHeight);

}




function scrollCamera() {
    var t = document.body.getBoundingClientRect().top;
     camera.position.x = camposx - t*t/5000 ;
     camera.position.y =  camposy;
      camera.position.z = camposz;

 

   
}

document.body.onscroll = scrollCamera;




function terrainMovement() {

    var time = Date.now() / 3000;

    for (var i = 0; i < number; i++) {


        var x = geometry.attributes.position.getX(i);
        var y = geometry.attributes.position.getY(i);


        geometry.attributes.position.setZ(i, Math.sin(x*2 * y/2 + time) * 25);
        geometry.attributes.position.needsUpdate = true;

    }

}

let oldx=0;
let oldy=0;
window.onmousemove = function(ev){
    let changex = ev.x - oldx;
    let changey = ev.y - oldy;
    camera.position.x += changex/100;
    camera.position.y -= changey/100;
    oldx = ev.x;
    oldy = ev.y;
};







function animate() {

    terrainMovement();
    requestAnimationFrame(animate);
    controls.update();
    
    render();
}


function render() {
    
  
    renderer.render(scene, camera);

}


