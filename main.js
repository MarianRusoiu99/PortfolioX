import * as THREE from "three";

import {
    OrbitControls
} from 'https://unpkg.com/three/examples/jsm/controls/OrbitControls';
import {
    ImprovedNoise
} from 'https://unpkg.com/three/examples/jsm/math/ImprovedNoise.js';



const camposx = 0,
    camposy = 0,
    camposz = 250;



let camera, scene, number, planeGeo;

var controls;


const start = Date.now();

const renderer = new THREE.WebGLRenderer({
    canvas: document.querySelector('#app'),
});

var vertexHeight = 15000,
    planeDefinition = 100,
    planeSize = 1245000,
    totalObjects = 1,
    background = "#002135",
    meshColor = "#005e97";




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
    planeGeo = new THREE.PlaneBufferGeometry(planeSize, planeSize, planeDefinition, planeDefinition);
    var plane = new THREE.Mesh(planeGeo, new THREE.MeshBasicMaterial({
        color: meshColor,
        wireframe: true
    }));
    plane.rotation.x -= Math.PI * 0.5;

    scene.add(plane);


    renderer.setSize(window.innerWidth, window.innerHeight);


    updatePlane();
    number = planeGeo.attributes.position.count;

    function updatePlane() {
        for (var i = 0; i < number; i++) {
            planeGeo.attributes.position[i] += Math.random() * vertexHeight - vertexHeight;
            //planeGeo.vertices[i] = planeGeo.vertices[i].z;
        }
    }

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


function animate() {


    //    requestAnimationFrame(render);
    
    var x = camera.position.x;
    var z = camera.position.z;
    camera.position.x = x * Math.cos(0.001) + z * Math.sin(0.001) - 10;
    camera.position.z = z * Math.cos(0.001) - x * Math.sin(0.001) - 10;
    camera.lookAt(new THREE.Vector3(0, 8000, 0));
   
    for (var i = 0; i < number; i++) {
        var ze = planeGeo.attributes.position.getZ(i);
        planeGeo.attributes.position.setZ(i, Math.sin((i + count * 0.00002)) * (ze - (ze * 0.6)));
        planeGeo.attributes.position.needUpdate = true;

        count += 0.1;
    }
    
    requestAnimationFrame(animate);
    controls.update();
    render();
}
var count = 0;

function render() {


    renderer.render(scene, camera);

}