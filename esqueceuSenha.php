<!DOCTYPE html>
<html>
    <head>
        <title>FIEB Eventos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src='js/jquery-3.3.1.min.js'></script>
      <script>
          $(function(){
              $('.recuperarSenha').submit(function(){
                  $.ajax({
                      url: 'cod_esqueceuSenha.php',
                      type: 'POST',
                      data: $('.recuperarSenha').serialize(),
                      success: function(data){
                          if(data != ''){
                              $('.recebeDados').html(data);
                              document.getElementById('visor').value = '';
                          }
                      }
                  });
                  return false;
              });
          });
      </script>
    </head>
    <body>
        <div id="container">
            <section>
                <h1>Recuperar senha</h1>
                <form method="post" class="recuperarSenha">
                    <input type="text" id="visor" name="email" />
                    <input type="submit" value="Recuperar" />
                    <div class='recebeDados'>
                        <!-- Aqui virá o conteúdo por ajax -->
                    </div>
                </form>        
            </section>
        </div>
    </body>
</html>