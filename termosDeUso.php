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
      <link href="css/TermosDeUso/default.css" rel=stylesheet>

      <!-- Telas Responsivas -->
      <link rel=stylesheet media="screen and (max-width:480px)" href="css/TermosDeUso/style480.css">
      <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="css/TermosDeUso/style768.css">
      <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="css/TermosDeUso/style1024.css">
      <link rel=stylesheet media="screen and (min-width:1025px)" href="css/TermosDeUso/style1366.css">

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
              <div class="Ancoragem">
                <ul>
                <li><a href="#visaoGeral">VISÃO GERAL</a></li>
                <li><a href="#secao1">SEÇÃO 1</a></li>
                <li><a href="#secao2">SEÇÃO 2</a></li>
                <li><a href="#secao3">SEÇÃO 3</a></li>
                <li><a href="#secao4">SEÇÃO 4</a></li>
                <li><a href="#secao5">SEÇÃO 5</a></li>
                <li><a href="#secao6">SEÇÃO 6</a></li>
                <li><a href="#secao7">SEÇÃO 7</a></li>
                <li><a href="#secao8">SEÇÃO 8</a></li>
                <li><a href="#secao9">SEÇÃO 9</a></li>
                <li><a href="#secao10">SEÇÃO 10</a></li>
                <li><a href="#secao11">SEÇÃO 11</a></li>
                <li><a href="#secao12">SEÇÃO 12</a></li>
                <li><a href="#secao13">SEÇÃO 13</a></li>
                <li><a href="#secao14">SEÇÃO 14</a></li>
                <li><a href="#secao15">SEÇÃO 15</a></li>
                <li><a href="#secao16">SEÇÃO 16</a></li>
                <li><a href="#secao17">SEÇÃO 17</a></li>
                <li><a href="#secao18">SEÇÃO 18</a></li>
                <li><a href="#secao19">SEÇÃO 19</a></li>
                <li><a href="#secao20">SEÇÃO 20</a></li>
                </ul>
              </div>

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
              <h2 id="secao1">SEÇÃO 1 - TERMOS DA LOJA VIRTUAL</h2>

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
                <h2 id="secao2">SEÇÃO 2 - CONDIÇÕES GERAIS</h2>

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
                <h2 id="secao3">SEÇÃO 3 - PRECISÃO, INTEGRIDADE E ATUALIZAÇÃO DAS INFORMAÇÕES</h2>

                <p>
                  Não somos responsáveis por informações disponibilizadas nesse site que não sejam precisas, completas ou atuais. O material desse site é fornecido apenas para fins informativos e não deve ser usado como a única base para tomar decisões sem consultar fontes de informações primárias, mais precisas, mais completas ou mais atuais. Qualquer utilização do material desse site é por sua conta e risco.
                  <br>
                  Esse site pode conter certas informações históricas. As informações históricas podem não ser atuais e são fornecidas apenas para sua referência. Reservamos o direito de modificar o conteúdo desse site a qualquer momento, mas nós não temos obrigação de atualizar nenhuma informação em nosso site. Você concorda que é de sua responsabilidade monitorar alterações no nosso site.
                </p>
              </section>

              <section>
                <h2 id="secao4">SEÇÃO 4 - MODIFICAÇÕES DO SERVIÇO E PREÇOS</h2>

                <p>
                  Os preços dos nossos produtos são sujeitos a alterações sem notificação.
                  <br>
                  Reservamos o direito de, a qualquer momento, modificar ou descontinuar o Serviço (ou qualquer parte ou conteúdo do mesmo) sem notificação em qualquer momento.
                  <br>
                  Não nos responsabilizados por você ou por qualquer terceiro por qualquer modificação, alteração de preço, suspensão ou descontinuação do Serviço.
                </p>
              </section>

              <section>
                <h2 id="secao5">SEÇÃO 5 - PRODUTOS OU SERVIÇOS (caso aplicável)</h2>

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
                <h2 id="secao6">SEÇÃO 6 - PRECISÃO DE INFORMAÇÕES DE FATURAMENTO E CONTA</h2>

                <p>
                  Reservamos o direito de recusar qualquer pedido que você nos fizer. Podemos, a nosso próprio critério, limitar ou cancelar o número de produtos por pessoa, por domicílio ou por pedido. Tais restrições podem incluir pedidos feitos na mesma conta de cliente, no mesmo cartão de crédito, e/ou pedidos que usam a mesma fatura e/ou endereço de envio. Caso façamos alterações ou cancelemos um pedido, pode ser que o notifiquemos por e-mail e/ou endereço/número de telefone de faturamento fornecidos no momento que o pedido foi feito. Reservamos o direito de limitar ou proibir pedidos que, a nosso critério exclusivo, parecem ser feitos por comerciantes, revendedores ou distribuidores.
                  <br>
                  Você concorda em fornecer suas informações de conta e compra completas para todas as compras feitas em nossa loja. Você concorda em atualizar prontamente sua conta e outras informações, incluindo seu e-mail, números de cartão de crédito e datas de validade, para que possamos completar suas transações e contatar você quando preciso.
                  <br>
                  Para mais detalhes, por favor, revise nossa Política de devolução.
                </p>
              </section>

              <section>
                <h2 id="secao7">SEÇÃO 7 - FERRAMENTAS OPCIONAIS</h2>

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
                <h2 id="secao8">SEÇÃO 8 - LINKS DE TERCEIROS</h2>

                <p>
                  Certos produtos, conteúdos e serviços disponíveis pelo nosso Serviço podem incluir materiais de terceiros.
                  <br>
                  Os links de terceiros nesse site podem te direcionar para sites de terceiros que não são afiliados a nós. Não nos responsabilizamos por examinar ou avaliar o conteúdo ou precisão. Não garantimos e nem temos obrigação ou responsabilidade por quaisquer materiais ou sites de terceiros, ou por quaisquer outros materiais, produtos ou serviços de terceiros.
                  <br>
                  Não somos responsáveis por quaisquer danos ou prejuízos relacionados com a compra ou uso de mercadorias, serviços, recursos, conteúdo, ou quaisquer outras transações feitas em conexão com quaisquer sites de terceiros. Por favor, revise com cuidado as políticas e práticas de terceiros e certifique-se que você as entende antes de efetuar qualquer transação. As queixas, reclamações, preocupações ou questões relativas a produtos de terceiros devem ser direcionadas ao terceiro.                
                </p>
              </section>

              <section>
                <h2 id="secao9">SEÇÃO 9 - COMENTÁRIOS, FEEDBACK, ETC. DO USUÁRIO</h2>

                <p>
                  Se, a nosso pedido, você enviar certos itens específicos (por exemplo, participação em um concurso), ou sem um pedido nosso, você enviar ideias criativas, sugestões, propostas, planos, ou outros materiais, seja online, por e-mail, pelo correio, ou de outra forma (em conjunto chamados de 'comentários'), você concorda que podemos, a qualquer momento, sem restrição, editar, copiar, publicar, distribuir, traduzir e de outra forma usar quaisquer comentários que você encaminhar para nós. Não nos responsabilizamos por: (1) manter quaisquer comentários em sigilo; (2) indenizar por quaisquer comentários; ou (3) responder quaisquer comentários.
                  <br>
                  Podemos, mas não temos a obrigação, de monitorar, editar ou remover conteúdo que nós determinamos a nosso próprio critério ser contra a lei, ofensivo, ameaçador, calunioso, difamatório, pornográfico, obsceno ou censurável ou que viole a propriedade intelectual de terceiros ou estes Termos de serviço.
                  <br>
                  Você concorda que seus comentários não violarão qualquer direito de terceiros, incluindo direitos autorais, marcas registradas, privacidade, personalidade ou outro direito pessoal ou de propriedade. Você concorda que os seus comentários não vão conter material difamatório, ilegal, abusivo ou obsceno. Eles também não conterão nenhum vírus de computador ou outro malware que possa afetar a operação do Serviço ou qualquer site relacionado. Você não pode usar um endereço de e-mail falso, fingir ser alguém diferente de si mesmo, ou de outra forma enganar a nós ou terceiros quanto à origem de quaisquer comentários. Você é o único responsável por quaisquer comentários que você faz e pela veracidade deles. Nós não assumimos qualquer responsabilidade ou obrigação por quaisquer comentários publicados por você ou por qualquer terceiro.
                </p>
              </section>

              <section>
                <h2 id="secao10">SEÇÃO 10 - INFORMAÇÕES PESSOAIS</h2>

                <p>
                O envio de suas informações pessoais através da loja é regido pela nossa Política de privacidade. Ver nossa Política de privacidade. 
                </p>
              </section>

              </section>

              <section>
                <h2 id="secao11">SEÇÃO 11 - ERROS, IMPRECISÕES E OMISSÕES</h2>

                <p>
                  Ocasionalmente, pode haver informações no nosso site ou no Serviço que contém erros tipográficos, imprecisões ou omissões que possam relacionar-se a descrições de produtos, preços, promoções, ofertas, taxas de envio do produto, o prazo de envio e disponibilidade. Reservamos o direito de corrigir quaisquer erros, imprecisões ou omissões, e de alterar ou atualizar informações ou cancelar encomendas caso qualquer informação no Serviço ou em qualquer site relacionado seja imprecisa, a qualquer momento e sem aviso prévio (até mesmo depois de você ter enviado o seu pedido).
                  <br>
                  Não assumimos nenhuma obrigação de atualizar, alterar ou esclarecer informações no Serviço ou em qualquer site relacionado, incluindo, sem limitação, a informações sobre preços, exceto conforme exigido por lei. Nenhuma atualização específica ou data de atualização no Serviço ou em qualquer site relacionado, deve ser utilizada para indicar que todas as informações do Serviço ou em qualquer site relacionado tenham sido modificadas ou atualizadas. 
                </p>
              </section>
              
              <section>
                <h2 id="#secao12">SEÇÃO 12 - USOS PROIBIDOS</h2>

                <p>
                 Além de outras proibições, conforme estabelecido nos Termos de serviço, você está proibido de usar o site ou o conteúdo para: (a) fins ilícitos; (b) solicitar outras pessoas a realizar ou participar de quaisquer atos ilícitos; (c) violar quaisquer regulamentos internacionais, provinciais, estaduais ou federais, regras, leis ou regulamentos locais; (d) infringir ou violar nossos direitos de propriedade intelectual ou os direitos de propriedade intelectual de terceiros; (e) para assediar, abusar, insultar, danificar, difamar, caluniar, depreciar, intimidar ou discriminar com base em gênero, orientação sexual, religião, etnia, raça, idade, nacionalidade ou deficiência; (f) apresentar informações falsas ou enganosas; (g) fazer o envio ou transmitir vírus ou qualquer outro tipo de código malicioso que será ou poderá ser utilizado para afetar a funcionalidade ou operação do Serviço ou de qualquer site relacionado, outros sites, ou da Internet; (h) coletar ou rastrear as informações pessoais de outras pessoas; (i) para enviar spam, phishing, pharm, pretext, spider, crawl, ou scrape; (j) para fins obscenos ou imorais; ou (k) para interferir ou contornar os recursos de segurança do Serviço ou de qualquer site relacionado, outros sites, ou da Internet. Reservamos o direito de rescindir o seu uso do Serviço ou de qualquer site relacionado por violar qualquer um dos usos proibidos.               
                </p>
              </section>

              <section>
                <h2 id="secao13">SEÇÃO 13 - ISENÇÃO DE RESPONSABILIDADE DE GARANTIAS; LIMITAÇÃO DE RESPONSABILIDADE</h2>

                <p>
                  Nós não garantimos, representamos ou justificamos que o seu uso do nosso serviço será pontual, seguro, sem erros ou interrupções.
                  <br>
                  Não garantimos que os resultados que possam ser obtidos pelo uso do serviço serão precisos ou confiáveis.
                  <br>
                  Você concorda que de tempos em tempos, podemos remover o serviço por períodos indefinidos de tempo ou cancelar a qualquer momento, sem te notificar.
                  <br>
                  Você concorda que o seu uso ou incapacidade de usar o serviço é por sua conta e risco. O serviço e todos os produtos e serviços entregues através do serviço são, exceto conforme declarado por nós) fornecidos sem garantia e conforme a disponibilidade para seu uso, sem qualquer representação, garantias ou condições de qualquer tipo, expressas ou implícitas, incluindo todas as garantias implícitas ou condições de comercialização, quantidade, adequação a uma finalidade específica, durabilidade, título, e não violação.
                  <br>
                  Em nenhuma circunstância o GIS, nossos diretores, oficiais, funcionários, afiliados, agentes, contratantes, estagiários, fornecedores, prestadores de serviços ou licenciadores serão responsáveis por qualquer prejuízo, perda, reclamação ou danos diretos, indiretos, incidentais, punitivos, especiais ou consequentes de qualquer tipo, incluindo, sem limitação, lucros cessantes, perda de receita, poupanças perdidas, perda de dados, custos de reposição, ou quaisquer danos semelhantes, seja com base em contrato, ato ilícito (incluindo negligência), responsabilidade objetiva ou de outra forma, decorrentes do seu uso de qualquer um dos serviços ou quaisquer produtos adquiridos usando o serviço, ou para qualquer outra reclamação relacionada de alguma forma ao seu uso do serviço ou qualquer produto, incluindo, mas não limitado a, quaisquer erros ou omissões em qualquer conteúdo, ou qualquer perda ou dano de qualquer tipo como resultado do uso do serviço ou qualquer conteúdo (ou produto) publicado, transmitido ou de outra forma disponível através do serviço, mesmo se alertado ​​de tal possibilidade. Como alguns estados ou jurisdições não permitem a exclusão ou a limitação de responsabilidade por danos consequentes ou incidentais, em tais estados ou jurisdições, a nossa responsabilidade será limitada à extensão máxima permitida por lei.
                </p>
              </section>

              <section>
                <h2 id="secao14">SEÇÃO 14 - INDENIZAÇÃO</h2>

                <p>
                 Você concorda em indenizar, defender e isentar GIS e nossos subsidiários, afiliados, parceiros, funcionários, diretores, agentes, contratados, licenciantes, prestadores de serviços, subcontratados, fornecedores, estagiários e funcionários, de qualquer reclamação ou demanda, incluindo honorários de advogados, por quaisquer terceiros devido à violação destes Termos de serviço ou aos documentos que incorporam por referência, ou à violação de qualquer lei ou os direitos de um terceiro.
                </p>
              </section>

              <section>
                <h2 id="secao15">SEÇÃO 15 - INDEPENDÊNCIA</h2>

                <p>
                  No caso de qualquer disposição destes Termos de serviço ser considerada ilegal, nula ou ineficaz, tal disposição deve, contudo, ser aplicável até ao limite máximo permitido pela lei aplicável, e a porção inexequível será considerada separada desses Termos de serviço. Tal determinação não prejudica a validade e aplicabilidade de quaisquer outras disposições restantes.
                </p>
              </section>

              <section>
                <h2 id="secao16">SEÇÃO 16 - RESCISÃO</h2>

                <p>
                  As obrigações e responsabilidades das partes incorridas antes da data de rescisão devem continuar após a rescisão deste acordo para todos os efeitos.
                  <br>
                  Estes Termos de Serviço estão em vigor, a menos que seja rescindido por você ou por nós. Você pode rescindir estes Termos de serviço a qualquer momento, notificando-nos que já não deseja utilizar os nossos serviços, ou quando você deixar de usar o nosso site.
                  <br>
                  Se em nosso critério exclusivo você não cumprir com qualquer termo ou disposição destes Termos de serviço, nós também podemos rescindir este contrato a qualquer momento sem aviso prévio e você ficará responsável por todas as quantias devidas até a data da rescisão; também podemos lhe negar acesso a nossos Serviços (ou qualquer parte deles).
                </p>
              </section>

              <section>
                <h2 id="secao17">SEÇÃO 17 - ACORDO INTEGRAL</h2>

                <p>
                  Caso não exerçamos ou executemos qualquer direito ou disposição destes Termos de serviço, isso não constituirá uma renúncia de tal direito ou disposição.
                  <br>
                  Estes Termos de serviço e quaisquer políticas ou normas operacionais postadas por nós neste site ou no que diz respeito ao serviço constituem a totalidade do acordo  entre nós. Estes termos regem o seu uso do Serviço, substituindo quaisquer acordos anteriores ou contemporâneos, comunicações e propostas, sejam verbais ou escritos, entre você e nós (incluindo, mas não limitado a quaisquer versões anteriores dos Termos de serviço).
                  <br>
                  Quaisquer ambiguidades na interpretação destes Termos de serviço não devem ser interpretadas contra a parte que os redigiu.
                </p>
              </section>

              <section>
                <h2 id="secao18">SEÇÃO 18 - LEGISLAÇÃO APLICÁVEL</h2>

                <p>
                  Esses Termos de serviço e quaisquer acordos separados em que nós lhe fornecemos os Serviços devem ser regidos e interpretados de acordo com as leis de Rua do ITB do Engenho Novo 238 , Barueri, SP, 06415-080, Brazil.                
                </p>
              </section>
              
              <section>
                <h2 id="secao19">SEÇÃO 19 - ALTERAÇÕES DOS TERMOS DE SERVIÇO</h2>

                <p>
                  Você pode rever a versão mais atual dos Termos de serviço a qualquer momento nessa página.
                  <br>
                  Reservamos o direito, a nosso critério, de atualizar, modificar ou substituir qualquer parte destes Termos de serviço ao publicar atualizações e alterações no nosso site. É sua responsabilidade verificar nosso site periodicamente. Seu uso contínuo ou acesso ao nosso site ou ao Serviço após a publicação de quaisquer alterações a estes Termos de serviço constitui aceitação dessas alterações.
                </p>
              </section>

              <section>
                <h2 id="secao20">SEÇÃO 20 - INFORMAÇÕES DE CONTATO</h2>

                <p>
                  As perguntas sobre os Termos de serviço devem ser enviadas para nós através do exodiadeini@gmail.com.                
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
