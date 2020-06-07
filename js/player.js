var video = document.querySelector("#video");
var speed = 1;

 function playV(){
    video.play();
  }

  function pauseV(){
    video.pause();
  }

  function stopV(){
    video.pause();
    video.currentTime = 0;
  }

  function fasterV(){
    video.play();
    speed += 0.5;
    if(speed >= 2) speed = 2;
    video.playbackRate = speed
  }

  function slowerV(){
    video.play();
    speed -= 0.5;
    if(speed <= 0) speed = 0.5;
    video.playbackRate = speed;
  }

  function fullscreenV(){
      if (video.requestFullscreen) {
          video.requestFullscreen();
        } 
      else if (video.mozRequestFullScreen) { /* Firefox */
          video.mozRequestFullScreen();
        } 
      else if (video.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
          video.webkitRequestFullscreen();
        } 
      else if (video.msRequestFullscreen) { /* IE/Edge */
          video.msRequestFullscreen();
      }
  }

  function volumeV(){
    var val = volume.value;
    video.volume = val/100;
  }
  
  function progressUpdate(){
    var dur = video.duration;
    var cur = video.currentTime;
    document.querySelector("#progress").value = (100 * cur) / dur;
    var sec = parseInt(video.currentTime, 10);
    
    document.querySelector("#videoTimeSec").innerHTML = sec % 60;
    document.querySelector("#videoTimeMin").innerHTML = parseInt(sec / 60, 10);

  }

  function rewindV(){
    var width = document.querySelector("#progress").offsetWidth;
    var o = event.offsetX;
    
    document.querySelector("#progress").value = 100 * o / width;
    video.pause();
    video.currentTime = video.duration * (o / width);
    video.play();
  }


  document.querySelector("#play").addEventListener("click", playV);
  document.querySelector("#pause").addEventListener("click", pauseV);
  document.querySelector("#stop").addEventListener("click", stopV);
  document.querySelector("#fullscreen").addEventListener("click", fullscreenV);
  document.querySelector("#faster").addEventListener("click", fasterV);
  document.querySelector("#slower").addEventListener("click", slowerV);
  document.querySelector("#volume").addEventListener("click", volumeV);
  document.querySelector("#progress").addEventListener("click", rewindV);
  video.ontimeupdate = progressUpdate;
  