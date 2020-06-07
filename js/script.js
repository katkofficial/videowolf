
$(document).ready(function ()
{
  var btnOpen = document.querySelector(".user__link");
  var btnClose = document.querySelectorAll(".popup-user .close");
  var popupUser = document.querySelector(".popup-zlp");
  var popupAuth = document.querySelector(".popup-auth");
  var popupReg = document.querySelector(".popup-reg");
  var overlay = document.querySelector(".overlay");

// НАДО В ОТДЕЛЬНЫЙ ФАЙЛ JS ПЛЕЕРА ЕБАНУТЬ
// ====================================================
  

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
