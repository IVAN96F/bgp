<!DOCTYPE html>
<html>
  <head>
    <title>AR Marker View</title>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="https://cdn.rawgit.com/jeromeetienne/ar.js/2.2.1/aframe/build/aframe-ar.js"></script>
    <style>
      body, html { margin: 0; overflow: hidden; }
    </style>
  </head>
  <body>
    <a-scene embedded arjs>
      <a-marker preset="hiro">
        <a-entity 
          gltf-model="{{ asset('storage/' . $product->glb_file) }}"
          scale="0.5 0.5 0.5"
          position="0 0 0"
          rotation="0 180 0"
        ></a-entity>
      </a-marker>
      <a-entity camera></a-entity>
    </a-scene>
  </body>
</html>
