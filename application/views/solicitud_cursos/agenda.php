<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hola </h1>
</body>
</html>


<!DOCTYPE HTML>
<html>
<head>
<style>
#div1, #div2, #div3{
  width: 200px;
  height: 35px;
  margin: 10px;
  padding: auto;
  border: 1px solid black;
}
</style>
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  var texto=document.getElementById(ev.target.id).innerText;
  ev.dataTransfer.setData("text", texto);
  
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  
  document.getElementById(ev.target.id).value = data;
  
}
</script>
</head>
<body>

<h2>Drag and Drop</h2>
<p>Drag the image back and forth between the two div elements.</p>



<input type="text" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"><br>

<input type="text" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"><br>


<input type="text" id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"><br>



<div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)">
<p draggable="true" ondragstart="drag(event)" id="drag1">Primer evento</p><br>
<p draggable="true" ondragstart="drag(event)" id="drag2">Segundo evento</p><br>
<p draggable="true" ondragstart="drag(event)" id="drag3">Tercer evento</p><br>
</div>

</body>
</html>