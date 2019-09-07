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

// Confirmar senha / email

function confirmarSenha(){
  var senha1 = document.getElementById("senha");
  var senha2 = document.getElementById("confSenha");
  var s1 = senha1.value;
  var s2 = senha2.value;
  if (s1 != s2) {
    document.getElementById("senha").style.borderColor="red";
    document.getElementById("confSenha").style.borderColor="red";
    document.getElementById("enviar").style.backgroundColor="grey";
    //$("form").submit(function () { return false; });
    $("h4").show().removeClass("ok").addClass("erro")
		.text('As senhas não batem.');
  }else{
      document.getElementById("senha").style.borderColor="grey";
      document.getElementById("confSenha").style.borderColor="grey";
      document.getElementById("enviar").style.backgroundColor="#012";
      //$("form").submit(function () { return true; });
      $("h4").show().removeClass("ok").addClass("erro")
  		.text('');
  }
}

function validaEmail(){
  var email1 = document.getElementById("email");
  var email = email1.value;
  var emailFilter=/^.+@.+\..{2,}$/;
	var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
	// condição
	if(!(emailFilter.test(email))||email.match(illegalChars)){
		$("h4").show().removeClass("ok").addClass("erro")
		.text('Por favor, informe um email válido.');
    document.getElementById("email").style.borderColor="red";
    document.getElementById("enviar").style.backgroundColor="grey";
    //$("form").submit(function () { return false; });
	}else{
    $("h4").show().removeClass("erro").text('');
    document.getElementById("email").style.borderColor="grey";
    document.getElementById("enviar").style.backgroundColor="#012";
    //$("form").submit(function () { return true; });
}
}

function confirmarEmail(){
  var email1 = document.getElementById("email");
  var email2 = document.getElementById("confEmail");
  var e1 = email1.value;
  var e2 = email2.value;
  if (e1 != e2) {
    document.getElementById("email").style.borderColor="red";
    document.getElementById("confEmail").style.borderColor="red";
    document.getElementById("enviar").style.backgroundColor="grey";
    //$("form").submit(function () { return false; });
    $("h4").show().removeClass("ok").addClass("erro")
		.text('Os emails não batem.');
  }else {
    document.getElementById("email").style.borderColor="grey";
    document.getElementById("confEmail").style.borderColor="grey";
    document.getElementById("enviar").style.backgroundColor="#012";
    //$("form").submit(function () { return true; });
    $("h4").show().removeClass("erro")
		.text('');
  }
}
