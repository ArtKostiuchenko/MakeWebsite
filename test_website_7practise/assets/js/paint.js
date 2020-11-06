let canvas = document.getElementById('draw');
context = canvas.getContext("2d");

let clickX = new Array();
let clickY = new Array();
let clickDrag = new Array();
let paint;
let mouseX;
let mouseY;



canvas.addEventListener('mousedown',function (e){
   mouseX = e.pageX - this.offsetLeft;
   mouseY = e.pageY - this.offsetTop;
   paint = true;
   addClick(mouseX, mouseY);
   redraw();
});
canvas.addEventListener('mousemove',function (e){
   if(paint){
       addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);

       redraw();
   }
});
canvas.addEventListener('mouseup',function (e){
   paint = false;
});
canvas.addEventListener('mouseleave',function (e){
   paint = false;
});

function addClick(x, y, dragging)
{
   clickX.push(x);
   clickY.push(y);
   clickDrag.push(dragging);
}

function redraw(){
   context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas

   context.lineJoin = "round";

   for(var i=0; i < clickX.length; i++) {
       context.beginPath();
       if(clickDrag[i] && i){
           context.moveTo(clickX[i-1], clickY[i-1]);
       }else{
           context.moveTo(clickX[i]-1, clickY[i]);
       }
       context.lineTo(clickX[i], clickY[i]);
       context.closePath();
       context.stroke();
   }
}

function clearcontent(){
    context.clearRect(0,0,context.canvas.width,context.canvas.height);
}

function setMyColor(){
    context.strokeStyle = document.getElementById("changecolor").value;
}

function setSize(){
    context.lineWidth = document.getElementById("text_size").value;
}
