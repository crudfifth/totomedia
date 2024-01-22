function ShowLenT(str) {
document.getElementById('outLenT').innerHTML = str.length + "<a>文字</a>"; 
}
function ShowLenC(str) {
  document.getElementById('outLenC').innerHTML = str.length + "文字"; 
}
function test() {
  var a =window.getSelection();
  console.log("日本語"+a.toString());
//- |   console.log(typeof a);
//- |   console.log(typeof a.toString());
}
//- | function typetest(str) {
//- |   console.log(str);
//- | }
function a(str) {
  let txt = str; console.log(txt);
  let b = txt.innerHTML;
  txt.innerHTML = `<input value="${b}">`;
}
function previewImage(obj)
{
  var fileReader = new FileReader();
  fileReader.onload = (function() {
    document.getElementById('preview1').src = fileReader.result;
    document.getElementById('preview2').src = fileReader.result;
  });
  fileReader.readAsDataURL(obj.files[0]);
}

function convertH1() {
  if (document.getElementById('article-headline') != '') {
    document.getElementById('article-headline').innerHTML = '';
  }
  let titleBlock = document.getElementById('headline').value;
  let h1 = document.getElementById('article-headline').appendChild(document.createElement('h1'));
  h1.innerHTML = titleBlock;
  h1.className = 'headline h-plus';
  document.getElementById('hidden-article-headline').value = document.getElementById('article-headline').textContent;
  // document.getElementById('hidden-article-headline-name').value = document.getElementById('article-headline').textContent;
}
function convertH2() {
  if (document.getElementById('element').value == "") {
    exit;
  } else {
    let wordBlock = document.getElementById('element').value;
    let h2 = document.getElementById('article').appendChild(document.createElement('h2'));
    h2.innerHTML = wordBlock;
    h2.className = 'headline'
    document.getElementById('hidden-article').value = document.getElementById('article').innerHTML;
    document.getElementById('element').value = '';
  }
}
function convertP() {
  if (document.getElementById('element').value == "") {
    exit;
  } else {
    let wordBlock = document.getElementById('element').value;
    let p = document.getElementById('article').appendChild(document.createElement('p'));
    p.innerHTML = wordBlock;
    document.getElementById('hidden-article').value = document.getElementById('article').innerHTML;
    document.getElementById('element').value = '';
  }
}












/*--------------------
Vars
--------------------*/
let width = window.innerWidth,
    height = window.innerHeight,
    scene,
    camera,
    renderer,
    lights = [];
    

/*--------------------
Init
--------------------*/
function init(){
  // Scene
  scene = new THREE.Scene();
	// scene.fog = new THREE.FogExp2( 0x000000, 0.15 );

  // Camera
  camera = new THREE.PerspectiveCamera(45, width / height, 1, 1000);
  camera.position.x = 0;
  // camera.position.y = 5;
  camera.position.z = 5;
  
  // Lights
  var ambientLight = new THREE.AmbientLight(0xb97cb1 );
  scene.add(ambientLight);
  
  
  lights[0] = new THREE.DirectionalLight( 0xfff, 1 );
  lights[0].position.set( 1, 0, 0 );
  lights[1] = new THREE.DirectionalLight( 0x11E8BB, 1 );
  lights[1].position.set( 0.75, 1, 0.5 );
  lights[2] = new THREE.DirectionalLight( 0xe7c873, 1 );
  lights[2].position.set( -0.75, -1, 0.5 );
  scene.add( lights[0] );
  scene.add( lights[1] );
  scene.add( lights[2] );
  
  // Sphere
  const geo = new THREE.SphereGeometry(1, 50, 50);
  const material = new THREE.MeshStandardMaterial({
    color: '#fff',
    transparent: true,
    side: THREE.DoubleSide,
    alphaTest: 0.5,
    opacity: 1,
    roughness: 0.8,
    metalness: 0.2
  });
  sphere = new THREE.Mesh(geo, material);
  
  sphere.castShadow = true;
  sphere.receiveShadow = true;
  scene.add(sphere);
  sphere.name = 'sphere';
  
  let sphereMaterial = sphere.material;
  
  let textureLoader2 = new THREE.TextureLoader();
  let texture2 = textureLoader2.load(getTextureBall());
  
  sphereMaterial.alphaMap = texture2;
  sphereMaterial.alphaMap.magFilter = THREE.NearestFilter;
  sphereMaterial.alphaMap.wrapT = THREE.RepeatWrapping;
  sphereMaterial.alphaMap.repeat.y = 2;
  sphere.rotation.z = Math.PI / 4;

  // let controls = new THREE.OrbitControls( camera );
  // controls.maxPolarAngle = 0.8 * Math.PI / 2;
  // controls.enableZoom = false;
  
  let shadow = sphere.clone();
  shadow.rotation.z = -Math.PI / 4;
  scene.add(shadow);
  
  
  // Renderer
  renderer = new THREE.WebGLRenderer({ alpha: true });
  renderer.shadowMap.enabled = true;
  renderer.setSize(width, height);
  document.querySelector('#webgl').appendChild(renderer.domElement);
  renderer.render(scene, camera);
  
  animate();
}
init();


/*--------------------
Animate
--------------------*/
function animate(time){
  renderer.render(scene, camera);
  requestAnimationFrame(animate);
  
  // animate sphere
  let sphere = scene.getObjectByName('sphere');
  sphere.material.alphaMap.offset.y -= 0.003;
  
}


/*--------------------
Win Resize
--------------------*/
window.addEventListener('resize', function(){
  width = window.innerWidth;
  height = window.innerHeight;
  renderer.setSize(width, height);
  camera.aspect = width / height;
  camera.updateProjectionMatrix();
});



/*--------------------
Texture
--------------------*/
function getTextureBall() {
  const data = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAICAMAAAAPxGVzAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjUyMTQyOTU0OTQ5MjExRTc4RkNGOEVCMkYzQzJBQjUxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjUyMTQyOTU1OTQ5MjExRTc4RkNGOEVCMkYzQzJBQjUxIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NTIxNDI5NTI5NDkyMTFFNzhGQ0Y4RUIyRjNDMkFCNTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NTIxNDI5NTM5NDkyMTFFNzhGQ0Y4RUIyRjNDMkFCNTEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4lVXhYAAAABlBMVEUAAAD///+l2Z/dAAAAE0lEQVR42mJgAAJGBggA0gABBgAAHgADIQZjZwAAAABJRU5ErkJggg==";
  
  return data;
}

