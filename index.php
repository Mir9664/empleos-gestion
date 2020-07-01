<!DOCTYPE >
<html>
    <head>
        <script src = "https://aframe.io/releases/1.0.4/aframe.min.js" > 
        </script>
    </head>
    <body>
        <a-scene fog="type: linear; color: #fff"></a-scene>
        <a-scene>

            <img id="texture" src="fondo/lupp.png"/>

            <a-assets>
                <a-asset-item id="crate-obj" src="modelos/empleos5.obj" ></a-asset-item>
                <a-asset-item id="crate-mtl" src="modelos/empleos5.mtl" ></a-asset-item>
            </a-assets> 

            <a-box position="-1 1.6 -5" animation="property: position; to: 1 8 -10; 
            dur: 2000; easing: linear; loop: true"   src="#texture"  scale="5 5 5"></a-box>
           
        </a-entity>
 <a-sky  src="fondo/cielo.png" scale=".1 .1 .1" ></a-sky>
            <a-obj-model src="#crate-obj" mtl="#crate-mtl" scale=".1 .1 .1" width="16" height="9" position="0 1 -1"></a-obj-model>


        </a-scene>
    </body>
</html>





