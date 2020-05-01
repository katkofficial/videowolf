var openPopupUser = (function () {
  var btnOpen = document.querySelector(".user__link");
  var btnClose = document.querySelectorAll(".popup-user .close");
  var popupUser = document.querySelector(".popup-zlp");
  var popupAuth = document.querySelector(".popup-auth");
  var popupReg = document.querySelector(".popup-reg");
  var overlay = document.querySelector(".overlay");

  btnOpen.addEventListener("click", function (e) {
    e.preventDefault();
    popupUser.style.display = "block";
    overlay.style.display = "block";
  });

  function closePop() {
    popupUser.style.display = "none";
    popupReg.style.display = "none";
    popupAuth.style.display = "block";
    overlay.style.display = "none";
  };

  overlay.addEventListener("click", closePop);

  btnClose.forEach((i) =>
    i.addEventListener("click", closePop));
})();

var toggleAuth = (function () {
  var btnAuth = document.querySelector(".reg .toggleAuth");
  var btnReg = document.querySelector(".auth .toggleReg");
  var popupAuth = document.querySelector(".popup-auth");
  var popupReg = document.querySelector(".popup-reg");

  btnReg.addEventListener("click", function (e) {
    e.preventDefault();
    popupAuth.style.display = "none";
    popupReg.style.display = "block";
  });

  btnAuth.addEventListener("click", function (e) {
    e.preventDefault();
    popupAuth.style.display = "block";
    popupReg.style.display = "none";
  });
})();