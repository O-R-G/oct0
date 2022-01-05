// Two eyes on a canvas that follow the mouse cursos
// just like xeyes
// Copyright (c) 2013 Niels Doorn

var canvas;
var context;
var mx = 0;
var my = 0;

// var eyes_center = [window.innerWidth / 2, 50];
var eyes_center = [40, window.innerHeight - 30];
var eyes_radius = 10;
var eyes_distance = 30;
var eyes = [

  {
    'centerX' : eyes_center[0] + eyes_distance / 2,
    'centerY' : eyes_center[1],
    'radius' : eyes_radius
  },
  
  {
    'centerX' : eyes_center[0] - eyes_distance / 2,
    'centerY' : eyes_center[1],
    'radius' : eyes_radius
  },
]
var eyes_color = document.body.classList.contains('night') ? '#fff' : '#000'; 
var pupil_ratio = 0.5;

window.onload = function() {
  canvas = document.getElementById('eyes');
  context = canvas.getContext('2d');
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  window.onmousemove = function(evt) { mx = evt.x; my = evt.y };
  setTimeout(function(){
    eyes_color = document.body.classList.contains('night') ? '#fff' : '#000'; 
    tekenFrame();
  }, 10);
}

function tekenFrame() {
  context.clearRect(0, 0, canvas.width, canvas.height);
  for (var i = 0; i < eyes.length; i++) {
    drawEye(eyes[i]);
  };
  // loop
  requestAnimationFrame(tekenFrame);
}

function drawEye(eye) {
  bepaalCoordinaten(eye);

  // clip the eye
  context.save();
  context.beginPath();
  context.arc(eye.centerX, eye.centerY, eye.radius, 0, Math.PI * 2);
  context.clip();
  
  
  // eye
  context.beginPath();
  context.arc(eye.centerX, eye.centerY, eye.radius, 0, Math.PI * 2);
  context.fillStyle = "transparent";
  context.fill();
  context.closePath();
  context.strokeStyle = eyes_color;
  context.lineWidth = 2;
  context.stroke();
 
  // pupil
  context.beginPath();
  context.arc(eye.centerX + eye.pupilX, eye.centerY + eye.pupilY, eye.radius * pupil_ratio, 0, Math.PI * 2);
  context.fillStyle = eyes_color;
  context.fill();
  context.closePath();

  context.restore();
}

function bepaalCoordinaten(eye) {
  // Distance from center point eye to cursor
  dx = mx - eye.centerX;
  dy = my - eye.centerY;

  // Pythagorean theorem
  c = Math.sqrt((dx*dx) + (dy*dy));
  
  // Distance center to pupil
  r = eye.radius * (1 - pupil_ratio);

  // Cursor on eye
  if (Math.abs(dx) < r && Math.abs(dy) < r && c < r && c != 0) {
    r = c;
  } 
  // console.log(dx, dy, r);

  // Angle determination
  alfa = Math.asin(dy / c);

  // Determine coordinates on edge circle
  eye.pupilX = Math.cos(alfa) * r;
  // Fix 180 degrees error
  eye.pupilX = (dx < 0 ? eye.pupilX * -1 : eye.pupilX);
  eye.pupilY = Math.sin(alfa) * r;
}
