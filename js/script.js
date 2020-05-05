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


$(document).ready(function ()
{
  
  document.querySelector("#play").addEventListener("click", playV);
  document.querySelector("#pause").addEventListener("click", pauseV);
  document.querySelector("#stop").addEventListener("click", stopV);
  document.querySelector("#fullscreen").addEventListener("click", fullscreenV);
  document.querySelector("#faster").addEventListener("click", fasterV);
  document.querySelector("#slower").addEventListener("click", slowerV);
  document.querySelector("#volume").addEventListener("click", volumeV);
  document.querySelector("#progress").addEventListener("click", rewindV);
  video.ontimeupdate = progressUpdate;


  
  
  

  var btnOpen = document.querySelector(".user__link");
  var btnClose = document.querySelectorAll(".popup-user .close");
  var popupUser = document.querySelector(".popup-zlp");
  var popupAuth = document.querySelector(".popup-auth");
  var popupReg = document.querySelector(".popup-reg");
  var overlay = document.querySelector(".overlay");

  function closePop()
  {
    popupUser.style.display = "none";
    popupReg.style.display = "none";
    popupAuth.style.display = "block";
    overlay.style.display = "none";
  };

  // overlay.addEventListener("click", closePop);

  btnClose.forEach(i =>
  {
    i.addEventListener("click", closePop);
  });

  function openPopupUser()
  {
    popupUser.style.display = "block";
    overlay.style.display = "block";
  }

  btnOpen.addEventListener("click", openPopupUser);

  $("#authorizationButton").click(function ()
  {
    var tableName = $("#tableName").val();
    var login = $("#authorizationLogin").val();
    var password = $("#authorizationPassword").val();

    $.ajax({
      type: "POST",
      dataType: "text",
      url: "Requests/Authorization.php",
      data: {
        tableName: tableName,
        login: login,
        password: password
      },
      success: function (data)
      {
        alert(data);
      }
    });

    closePop();

  });

  $("#registrationButton").click(function ()
  {
    var tableName = $("#tableName").val();
    var login = $("#registrationLogin").val();
    var password = $("#registrationPassword").val();
    var confirmPassword = $("#registrationConfirmPassword").val();

    if (password != confirmPassword) {
      return;
    }

    $.ajax({
      type: "POST",
      dataType: "text",
      url: "Requests/Registration.php",
      data: {
        tableName: tableName,
        login: login,
        password: password
      },
      success: function (data)
      {
        alert(data);
      }
    });

  });

  $("#firstVideo").click(function() {
    var name = $("#firstVideo").text();
    var category = $("#category").val();

    var video = document.querySelector("#video");

    video.setAttribute("src", encodeURI("Requests/Streaming.php?Category=" + category + "&VideoName=" + name));
    video.setAttribute("type", "video/mp4");

    video.load();

    video.play();
});

})

var toggleAuth = (function ()
{
  var btnAuth = document.querySelector(".reg .toggleAuth");
  var btnReg = document.querySelector(".auth .toggleReg");
  var popupAuth = document.querySelector(".popup-auth");
  var popupReg = document.querySelector(".popup-reg");

  btnReg.addEventListener("click", function (e)
  {
    e.preventDefault();
    popupAuth.style.display = "none";
    popupReg.style.display = "block";
  });

  btnAuth.addEventListener("click", function (e)
  {
    e.preventDefault();
    popupAuth.style.display = "block";
    popupReg.style.display = "none";
  });
})();
