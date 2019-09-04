// Ativar Menu

function activateMenu(){
    document.getElementById("on_off").classList.toggle('active-menu');
}

// Mostrar Notificações

function activateNotif(){
    document.getElementById("on_off-notif").classList.toggle('active-notif');
}

// Mudar cor do header
var width = screen.width;

jQuery(function () {
  jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() < 30) {
       $("#on_off").addClass("header-inv");
      } else {
       $("#on_off").removeClass("header-inv");
     }
  });
});


jQuery(function () {
  jQuery(window).scroll(function () {
    var width = screen.width;

    if (width <= 480) {
        var i = 580;
        var f = 1670;
    } else if (width <= 768) {
        var i = 780;
        var f = 1900;
    }


    if (jQuery(this).scrollTop() > i && jQuery(this).scrollTop() < f) {
     $("#on_off").addClass("header-azul");
    } else {
     $("#on_off").removeClass("header-azul");
    }
  });
});
