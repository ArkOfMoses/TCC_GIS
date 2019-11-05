<?php
session_start();
if(isset($_SESSION['logado'])){
  unset($_SESSION['dadosUsu']);
  unset($_SESSION['logado']);
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

      <title> Termos de Serviço</title>

      <meta charset=UTF-8>
      <!-- ISO-8859-1 -->
      <meta name=viewport content="width=device-width, initial-scale=1.0">
      <meta name=description content="">
      <meta name=keywords content="">
      <!-- Opcional -->
      <meta name=author content='G4 INI3B GIS'>

      <!-- favicon, arquivo de imagem podendo ser 8x8 - 16x16 - 32x32px com extensão .ico -->
      <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">

      <!-- CSS PADRÃO -->
      <link href="css/landingPage/default.css" rel=stylesheet>

      <!-- Telas Responsivas -->
      <link rel=stylesheet media="screen and (max-width:480px)" href="css/landingPage/style480.css">
      <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="css/landingPage/style768.css">
      <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="css/landingPage/style1024.css">
      <link rel=stylesheet media="screen and (min-width:1025px)" href="css/landingPage/style1366.css">

      <!-- Script -->
      <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
      <script src="js/jquery.mask.min.js" type="text/javascript"></script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
      <script src="js/script.js"></script>
      <script>
          $(function(){
              $('.form-registro').submit(function(){
                  $.ajax({
                      url: 'cadastroMaster.php',
                      type: 'POST',
                      data: $('.form-registro').serialize(),
                      success: function(data){
                          if(data != ''){
                              $("h4").html(data);
                          }
                      }
                  });
                  return false;
              });
          });
      </script>

      <!-- Icon Font -->
      <script src="https://kit.fontawesome.com/2a85561c69.js"></script>
  </head>

  <body>
      <div class="content">

        <header id="on_off">
          <div class="header">

            <a class="logo" href="homeLandingPage.php">
              <?xml version="1.0" encoding="utf-8"?>
              <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
              <svg version="1.1" id="Logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 595.2 595.3" style="enable-background:new 0 0 595.2 595.3;" xml:space="preserve" alt="Logo GIS">
                <style type="text/css">
                	.st0{fill:url(#LetraG_2_);}
                	.st1{fill:#006699;}
                	.st2{fill:url(#Bola_2_);}
                </style>
                <linearGradient id="LetraG_2_" gradientUnits="userSpaceOnUse" x1="-130.1162" y1="-1.6877" x2="-127.636" y2="-1.6877" gradientTransform="matrix(120.0332 -207.9035 -207.9035 -120.0332 15416.1299 -26698.6406)">
                	<stop  offset="0" style="stop-color:#00CCCC"/>
                	<stop  offset="1" style="stop-color:#0066CC"/>
                </linearGradient>
                <path id="LetraG_1_" class="st0" d="M297.2,0c-1.8,0-3.5,0-5.3,0C214.5,1.5,141.6,32.5,86.8,87.8C32,143.2,1,216.1,0,293.4
                	c-1,80.4,29.5,156.2,85.8,213.3c56.3,57,131.4,88.5,211.8,88.5c164.2,0,297.6-133.4,297.6-297.6c0-31.8-25.8-58-58.1-58
                	c-0.2,0-0.3,0-0.5,0l-103.4,1c-32.2,0-58.3,26-58.3,58.3c0,30.5,23.2,55.4,53,58c1.8,0.2,3.5,0.2,5.3,0.2l35.2-0.2l0,0h49.1
                	c-28.1,80.7-104.9,138.6-195.1,138.6c-74.3,0-139.4-39.2-175.8-98l0,0c-20.1-30.1-30.7-65.6-30.1-102.7
                	c1.5-96.5,81.1-176.6,177.6-178.3c1.1,0,2.1,0,3.2,0c41.8,0,82.2,14.3,114.1,40.5c3,2.5,6.2,4.7,9.7,6.4c8.4,4.4,17.7,6.6,26.9,6.6
                	c13,0,25.9-4.3,36.3-12.5c3.2-2.7,6.4-5.7,9.2-9.2c20.1-25,16.4-61.8-8.7-82.1C431.9,23.5,365.5,0,297.2,0"/>
                <path id="Sombra_1_" class="st1" d="M517.6,357h-49.1l0,0c-7.2,21-18.3,40.4-32.5,57.2c0,0,0,0-0.2,0.2c0,0.2,0,0.2-0.2,0.5
                	c-3,3.2-6,6.7-9.2,9.9c-30.8,31-72.4,51.1-118.6,53.6c-2.2,0.2-4.2,0.2-6.4,0.2h-3.7c-6.5,0-12.9-0.3-19.2-1
                	c-5.7-0.6-11.3-1.5-16.9-2.6c-5.8-1.2-11.6-2.6-17.2-4.3c-4.9-1.5-9.8-3.2-14.6-5.2c-22.6-9.2-43.5-22.9-61.1-40.9
                	c-2.7-2.7-5.2-5.5-7.7-8.3c-5.2-6-10-12.3-14.3-18.7c36.4,58.8,101.5,98,175.8,98C412.7,495.6,489.5,437.7,517.6,357"/>
                <linearGradient id="Bola_2_" gradientUnits="userSpaceOnUse" x1="-127.1179" y1="-8.5597" x2="-124.6378" y2="-8.5597" gradientTransform="matrix(23.7034 -41.0554 -41.0554 -23.7034 2931.1543 -5073.1851)">
                	<stop  offset="0" style="stop-color:#00CCCC"/>
                	<stop  offset="1" style="stop-color:#0066CC"/>
                </linearGradient>
                <path id="Bola_1_" class="st2" d="M358.1,297.7c0,18.9-8.9,35.6-22.8,46.3c-9.8,7.5-22.1,12-35.5,12h-2c-32.2,0-58.3-26-58.3-58.3
              	s26-58.3,58.3-58.3h2c13.4,0,25.7,4.5,35.5,12.1C349.2,262.1,358.1,278.9,358.1,297.7z"/>
              </svg>

            </a>

            <label onclick="activateMenu()" class="hamburger">
              <?xml version="1.0" encoding="utf-8"?>
              <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
              <svg version="1.1" id="Hamburger" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 220 150" style="enable-background:new 0 0 220 150;" xml:space="preserve" alt="menu">
                <style type="text/css">
                	.st4{fill:#003366;}
                </style>
                <g>
                	<path class="st4" d="M220,10c0-5.5-4.5-10-10-10H10C4.5,0,0,4.5,0,10s4.5,10,10,10h200C215.6,20,220,15.6,220,10z"/>
                	<path class="st4" d="M210,65H98.9c-5.5,0-10,4.5-10,10s4.5,10,10,10H210c5.5,0,10-4.5,10-10S215.6,65,210,65z"/>
                	<path class="st4" d="M210,130H33.2c-5.5,0-10,4.5-10,10s4.5,10,10,10h176.9c5.5,0,10-4.5,10-10S215.6,130,210,130z"/>
                </g>
              </svg>
            </label>

          </div>

          <div class="fullnav">
          <nav class="menu">

            <ul class="menu-buttons">
              <li><a href="homeLandingPage.php">Home</a></li>
              <li class="login-btn"><a href="loginLandingPage.php">Entrar</a></li>
              <li><a href="contatoLandingPage.php">Contato</a></li>
              <li><a href="#">Sobre Nós</a></li>
            </ul>

          </nav>
        </div>

        </header>

        <main>
           <section>
              <h1>Termos de Serviço</h1>

              ----
              <section>
                <h2 id="visaoGeral">VISÃO GERAL</h2>

                <p>
                  Esse site é operado pelo GIS. Em todo o site, os termos “nós”, “nos” e “nosso” se referem ao GIS. O GIS proporciona esse site, incluindo todas as informações, ferramentas e serviços disponíveis deste site para você, o usuário, com a condição da sua aceitação de todos os termos, condições, políticas e avisos declarados aqui.
                  <br>
                  Ao visitar nosso site e/ou comprar alguma coisa no nosso site, você está utilizando nossos “Serviços”. Consequentemente, você  concorda com os seguintes termos e condições (“Termos de serviço”, “Termos”), incluindo os termos e condições e políticas adicionais mencionados neste documento e/ou disponíveis por hyperlink. Esses Termos de serviço se aplicam a todos os usuários do site, incluindo, sem limitação, os usuários que são navegadores, fornecedores, clientes, lojistas e/ou contribuidores de conteúdo.
                  <br>
                  Por favor, leia esses Termos de serviço cuidadosamente antes de acessar ou utilizar o nosso site. Ao acessar ou usar qualquer parte do site, você concorda com os Termos de serviço. Se você não concorda com todos os termos e condições desse acordo, então você não pode acessar o site ou usar quaisquer serviços. Se esses Termos de serviço são considerados uma oferta, a aceitação é expressamente limitada a esses Termos de serviço.
                  <br>
                  Quaisquer novos recursos ou ferramentas que forem adicionados à loja atual também devem estar sujeitos aos Termos de serviço. Você pode revisar a versão mais atual dos Termos de serviço quando quiser nesta página. Reservamos o direito de atualizar, alterar ou trocar qualquer parte desses Termos de serviço ao publicar atualizações e/ou alterações no nosso site. É sua responsabilidade verificar as alterações feitas nesta página periodicamente. Seu uso contínuo ou acesso ao site após a publicação de quaisquer alterações constitui aceitação de tais alterações.
                </p>
              </section>

              <section>
              <h2 id="#secao1">SEÇÃO 1 - TERMOS DA LOJA VIRTUAL</h2>

                <p>
                  Ao concordar com os Termos de serviço, você confirma que você é maior de idade em seu estado ou província de residência e que você nos deu seu consentimento para permitir que qualquer um dos seus dependentes menores de idade usem esse site.
                  <br>
                  Você não deve usar nossos produtos para qualquer fim ilegal ou não autorizado. Você também não pode, ao usufruir deste Serviço, violar quaisquer leis em sua jurisdição (incluindo, mas não limitado, a leis de direitos autorais).
                  <br>
                  Você não deve transmitir nenhum vírus ou qualquer código de natureza destrutiva.
                  <br>
                  Violar qualquer um dos Termos tem como consequência a rescisão imediata dos seus Serviços.
                </p>
              </section>

              <section>
                <h2 id="#secao2">SEÇÃO 2 - CONDIÇÕES GERAIS</h2>

                <p>
                  Reservamos o direito de recusar o serviço a qualquer pessoa por qualquer motivo a qualquer momento.
                  <br>
                  Você entende que o seu conteúdo (não incluindo informações de cartão de crédito), pode ser transferido sem criptografia e pode: (a) ser transmitido por várias redes; e (b) sofrer alterações para se adaptar e se adequar às exigências técnicas de conexão de redes ou dispositivos. As informações de cartão de crédito sempre são criptografadas durante a transferência entre redes.
                  <br>
                  Você concorda em não reproduzir, duplicar, copiar, vender, revender ou explorar qualquer parte do Serviço, uso do Serviço, acesso ao Serviço, ou qualquer contato no site através do qual o serviço é fornecido, sem nossa permissão expressa por escrito.
                  <br>
                  Os títulos usados nesse acordo são incluídos apenas por conveniência e não limitam ou  afetam os Termos.
                </p>
              </section>

              <section>
                <h2 id="#secao3">SEÇÃO 3 - PRECISÃO, INTEGRIDADE E ATUALIZAÇÃO DAS INFORMAÇÕES</h2>

                <p>
                  Não somos responsáveis por informações disponibilizadas nesse site que não sejam precisas, completas ou atuais. O material desse site é fornecido apenas para fins informativos e não deve ser usado como a única base para tomar decisões sem consultar fontes de informações primárias, mais precisas, mais completas ou mais atuais. Qualquer utilização do material desse site é por sua conta e risco.
                  <br>
                  Esse site pode conter certas informações históricas. As informações históricas podem não ser atuais e são fornecidas apenas para sua referência. Reservamos o direito de modificar o conteúdo desse site a qualquer momento, mas nós não temos obrigação de atualizar nenhuma informação em nosso site. Você concorda que é de sua responsabilidade monitorar alterações no nosso site.
                </p>
              </section>

              <section>
                <h2 id="#secao4">SEÇÃO 4 - MODIFICAÇÕES DO SERVIÇO E PREÇOS</h2>

                <p>
                  Os preços dos nossos produtos são sujeitos a alterações sem notificação.
                  <br>
                  Reservamos o direito de, a qualquer momento, modificar ou descontinuar o Serviço (ou qualquer parte ou conteúdo do mesmo) sem notificação em qualquer momento.
                  <br>
                  Não nos responsabilizados por você ou por qualquer terceiro por qualquer modificação, alteração de preço, suspensão ou descontinuação do Serviço.
                </p>
              </section>

              <section>
                <h2 id="#secao5">SEÇÃO 5 - PRODUTOS OU SERVIÇOS (caso aplicável)</h2>

                <p>
                  Certos produtos ou serviços podem estar disponíveis exclusivamente online através do site. Tais produtos ou serviços podem ter quantidades limitadas e são sujeitos a apenas devolução ou troca, de acordo com nossa Política de devolução.
                  <br>
                  Fizemos todo o esforço possível da forma mais precisa as cores e imagens dos nossos produtos que aparecem na loja. Não podemos garantir que a exibição de qualquer cor no monitor do seu computador será precisa.
                  <br>
                  Reservamos o direito, mas não somos obrigados, a limitar as vendas de nossos produtos ou Serviços para qualquer pessoa, região geográfica ou jurisdição. Podemos exercer esse direito conforme o caso. Reservamos o direito de limitar as quantidades de quaisquer produtos ou serviços que oferecemos. Todas as descrições de produtos ou preços de produtos são sujeitos a alteração a qualquer momento sem notificação, a nosso critério exclusivo. Reservamos o direito de descontinuar qualquer produto a qualquer momento. Qualquer oferta feita por qualquer produto ou serviço nesse site é nula onde for proibido por lei.
                  <br>
                  Não garantimos que a qualidade de quaisquer produtos, serviços, informações ou outros materiais comprados ou obtidos por você vão atender às suas expectativas, ou que quaisquer erros no Serviço serão corrigidos.
                </p>
              </section>

              <section>
                <h2 id="#secao6">SEÇÃO 6 - PRECISÃO DE INFORMAÇÕES DE FATURAMENTO E CONTA</h2>

                <p>
                  Reservamos o direito de recusar qualquer pedido que você nos fizer. Podemos, a nosso próprio critério, limitar ou cancelar o número de produtos por pessoa, por domicílio ou por pedido. Tais restrições podem incluir pedidos feitos na mesma conta de cliente, no mesmo cartão de crédito, e/ou pedidos que usam a mesma fatura e/ou endereço de envio. Caso façamos alterações ou cancelemos um pedido, pode ser que o notifiquemos por e-mail e/ou endereço/número de telefone de faturamento fornecidos no momento que o pedido foi feito. Reservamos o direito de limitar ou proibir pedidos que, a nosso critério exclusivo, parecem ser feitos por comerciantes, revendedores ou distribuidores.
                  <br>
                  Você concorda em fornecer suas informações de conta e compra completas para todas as compras feitas em nossa loja. Você concorda em atualizar prontamente sua conta e outras informações, incluindo seu e-mail, números de cartão de crédito e datas de validade, para que possamos completar suas transações e contatar você quando preciso.
                  <br>
                  Para mais detalhes, por favor, revise nossa Política de devolução.
                </p>
              </section>

              <section>
                <h2 id="#secao7">SEÇÃO 7 - FERRAMENTAS OPCIONAIS</h2>

                <p>
                  Podemos te dar acesso a ferramentas de terceiros que não monitoramos e nem temos qualquer controle.
                  <br>
                  Você reconhece e concorda que nós fornecemos acesso a tais ferramentas ”como elas são” e “conforme a disponibilidade” sem quaisquer garantias, representações ou condições de qualquer tipo e sem qualquer endosso. Não nos responsabilizamos de forma alguma pelo seu uso de ferramentas opcionais de terceiros.
                  <br>
                  Qualquer uso de ferramentas opcionais oferecidas através do site é inteiramente por sua conta e risco e você se familiarizar e aprovar os termos das ferramentas que são fornecidas por fornecedor(es) terceiro(s).
                  <br>
                  Também podemos, futuramente, oferecer novos serviços e/ou recursos através do site (incluindo o lançamento de novas ferramentas e recursos). Tais recursos e/ou serviços novos também devem estar sujeitos a esses Termos de serviço.
                </p>
              </section>

              <section>
                <h2 id="#secao8">SEÇÃO 8 - LINKS DE TERCEIROS</h2>

                <p>
                Certos produtos, conteúdos e serviços disponíveis pelo nosso Serviço podem incluir materiais de terceiros.
                <br>
                Os links de terceiros nesse site podem te direcionar para sites de terceiros que não são afiliados a nós. Não nos responsabilizamos por examinar ou avaliar o conteúdo ou precisão. Não garantimos e nem temos obrigação ou responsabilidade por quaisquer materiais ou sites de terceiros, ou por quaisquer outros materiais, produtos ou serviços de terceiros.
                <br>
                Não somos responsáveis por quaisquer danos ou prejuízos relacionados com a compra ou uso de mercadorias, serviços, recursos, conteúdo, ou quaisquer outras transações feitas em conexão com quaisquer sites de terceiros. Por favor, revise com cuidado as políticas e práticas de terceiros e certifique-se que você as entende antes de efetuar qualquer transação. As queixas, reclamações, preocupações ou questões relativas a produtos de terceiros devem ser direcionadas ao terceiro.                
                </p>
              </section>

              <section>
                <h2 id="#secao8">SEÇÃO 9 - COMENTÁRIOS, FEEDBACK, ETC. DO USUÁRIO</h2>

                <p>
                Certos produtos, conteúdos e serviços disponíveis pelo nosso Serviço podem incluir materiais de terceiros.
                <br>
                Os links de terceiros nesse site podem te direcionar para sites de terceiros que não são afiliados a nós. Não nos responsabilizamos por examinar ou avaliar o conteúdo ou precisão. Não garantimos e nem temos obrigação ou responsabilidade por quaisquer materiais ou sites de terceiros, ou por quaisquer outros materiais, produtos ou serviços de terceiros.
                <br>
                Não somos responsáveis por quaisquer danos ou prejuízos relacionados com a compra ou uso de mercadorias, serviços, recursos, conteúdo, ou quaisquer outras transações feitas em conexão com quaisquer sites de terceiros. Por favor, revise com cuidado as políticas e práticas de terceiros e certifique-se que você as entende antes de efetuar qualquer transação. As queixas, reclamações, preocupações ou questões relativas a produtos de terceiros devem ser direcionadas ao terceiro.                
                </p>
              </section>

           </section>

            

        </main>

        <footer>
          <a href="#h3"><i class="fas fa-chevron-up"></i></a>

          <a class="selecionado">Home</a>
          <a href="loginLandingPage.php">Entrar na Conta</a>
          <a href="contatoLandingPage.php">Contato</a>
          <a href="#">Sobre Nós</a>

        </footer>

    </div>
    <script type="text/javascript">
            $(document).ready(function(){
                $("#dataNasc").mask("00/00/0000");
            })

    </script>

  </body>

</html>
