<?php get_header(); ?>
    <head>
        <script src="https://www.google.com/recaptcha/api.js?render=6LdorMIZAAAAAKZ53qVxelTCrEI1K51BE1odSC2L
      "></script>
        <script>
            grecaptcha.ready(function () {
                grecaptcha.execute('6LdorMIZAAAAAKZ53qVxelTCrEI1K51BE1odSC2L', {action: 'contact'}).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
            });
        </script>
    </head>
    <body>
    <section class="header-principal">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="conteudo-banner">
                        <p style="text-align: center; color: #ffffff; font-weight: bold; font-size: 30px;"><?php the_field('titulo_principal'); ?></p>
                        <br/>
                        <p style="color: #ffffff !important;"
                           class="melhores-precos"><?php the_field('descricao_principal'); ?>
                        </p>

                        <a class="ver-tabela" href="#table">
                            <button class="btn btn-danger center-block">Veja nossas ofertas!</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">

                    <form method="post"
                          action="https://www.topbrasilseguros.com.br/wp-content/themes/topbrasil/src/testeladingpage/enviar-seguro.php"
                          name="registro" id="envia" class="formulario">
                        <p class="desconto"><?php the_field('titulo_do_formulario'); ?></p>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira o nome completo do segurado</label>
                                        <input type="text" name="nome" id="nome" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><br/>
                                        <label style="color: #fff;">Insira o e-mail</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira o celular</label>
                                        <input type="text" name="telefone" id="phone-number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira o peso</label>
                                        <input type="text" name="peso" id="peso" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br/>
                                        <label style="color: #fff;">Insira a altura</label>
                                        <input type="text" name="altura" id="altura" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira dia, mês e ano de nascimento</label>
                                        <input type="text" name="data" id="data" class="form-control">
                                    </div>
                                </div>
                                <br/>

                                <div class="col-md-6">
                                    <div class="form-group"><br/>
                                        <label style="color: #fff;">Insira a Renda</label>
                                        <input type="text" name="renda" id="renda" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira a profissão ou o tipo de
                                            aposentadoria</label>
                                        <input type="text" name="profissao" id="profissao" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Você fuma ou fumou nos últimos 2 anos?</label>
                                        <input type="text" name="fumante" id="fumante" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><br/>
                                        <label style="color: #fff;">Insira o seu CPF</label>
                                        <input type="text" name="cpf" id="cpf" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="color: #fff;">Detalhe a profissão atual ou a exercida antes da
                                            aposentadoria</label>
                                        <input type="text" name="especificacao" id="especificacao" class="form-control"
                                               required>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                     <div class="form-group">
                                         <div class="radio text-left">
                                             <label style="color: #fff; margin-left: -17px;">Responda com Sim ou Não se fuma ou já fumou nos
                                                 últimos
                                                 2 anos. <br/><br/>
                                                 <input type="checkbox" name="fumante" id="agree" value="sim"> Sim &nbsp;
                                                 <input type="checkbox" name="fumante" id="agree" value="nao" checked="">
                                                 Não

                                                 </span>
                                                 <br>
                                             </label>
                                         </div>
                                     </div>
                                 </div> -->

                                <div class="form-group">
                                    <input type="hidden" name="pagina" value="Seguro de Vida">
                                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                    <?php // Check if form was submitted:
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

                                        // Build POST request:
                                        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                                        $recaptcha_secret = '6LdorMIZAAAAAKal4e6Gy4jOqAmgCt0s0TY-FX4f';
                                        $recaptcha_response = $_POST['recaptcha_response'];

                                        // Make and decode POST request:
                                        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                                        $recaptcha = json_decode($recaptcha);

                                        // Take action based on the score returned:
                                        if ($recaptcha->score >= 0.5) {
                                            // Verified - send email
                                        } else {
                                            // Not verified - show form error
                                        }

                                    } ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" value="enviar" class="btn btn-danger center-block">Enviar</button>
                        <br/>
                    </form>

                    <!--   <?php if (get_field('imagem_fundo_azul')): ?>
                  <img class="img-responsive" src="<?php the_field('imagem_fundo_azul'); ?>" />
               <?php endif; ?> -->

                    <br/><br/>
                </div>
            </div>
        </div>
    </section>
    <section class="logos" id="table">
        <div class="container">
            <h1 style="color: #36538f; text-transform: uppercase; font-size: 23px; font-family: sans-serif;
            font-weight: 600;"><?php the_field('titulo_h1'); ?></h1>
            <?php the_field('briefing_h1'); ?> <br/>

            <?php
            $link = get_field('botao_1');
            if ($link): ?>
                <button class="btn btn-danger btn-sm center-block" data-toggle="modal" data-target="#myModal">Solicite
                    um Orçamento
                </button>
            <?php endif; ?>
        </div>


    </section>
    <section class="logos" id="preco">
        <div class="container">
            <h2><?php the_field('titulo_antecedente_a_tabelas'); ?></h2>
            <?php the_field('briefing_antecedente_a_tabela'); ?> <br/>
        </div>
    </section>
    <section class="logos" id="table">
        <div class="container">
            <h2><?php the_field('titulo_parceiros_logo'); ?></h2>
            <?php the_field('briefing_da_tabela_de_precos'); ?> <br/>
            <?php if (get_field('tabelas_precos_idosos_barato')): ?>
                <?php while (has_sub_field('tabelas_precos_idosos_barato')): ?>
                    <div class="col-md-3 dividi">
                        <img class="img-responsive center-block" src="<?php the_sub_field('imagem_do_icone'); ?>"
                             alt="<?= $imagem_do_icone['title'] ?>  ">
                        <span class="center-block"
                              style="color: #36538f; font-size: 24px; text-align: center !important; font-family: unset; font-weight: bold;">
            <?php the_sub_field('titulo_do_produto'); ?></span> <br/>
                        <span class="partir-de">A partir de:</span> <br/>
                        <span class="valor"><span class="obs">*</span><?php the_sub_field('valor_do_produto'); ?></span>
                        &nbsp; <span>mensais</span>
                        <?php
                        $link_da_tabela = get_sub_field('link_da_tabela');

                        if ($link_da_tabela): ?>
                            <a href="<?php echo esc_url($link_da_tabela); ?>">
                                <button class="btn btn-info btn-sm center-block">
                                    Ver tabela de preços completa
                                </button>
                            </a> <br/>
                        <?php endif; ?>
                        <?php
                        $link_da_rede_credenciada = get_sub_field('link_da_rede_credenciada');

                        if ($link_da_rede_credenciada): ?>
                            <a href="<?php echo esc_url($link_da_rede_credenciada); ?>">
                                <button class="btn btn-warning btn-sm center-block">
                                    Ver Rede Credenciada
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <br/><br/>

            <?php
            $link = get_field('botao_2');
            if ($link): ?>
                <button class="btn btn-danger btn-sm center-block" data-toggle="modal" data-target="#myModal">Solicite
                    um Orçamento
                </button>
            <?php endif; ?>

        </div>
    </section>

    <!--
   <section class="garantia">
      <div class="container">
         <div class="col-md-6">
            <h2 class="titulo"><?php the_field('titulo_principal_2'); ?></h2>
            <p><?php the_field('briefing_principal'); ?></p>
            <?php if (get_field('ancora')): ?>
            <ul class="link-ancora">
               <?php while (has_sub_field('ancora')): ?>
               <?php
        $link_da_ancora = get_sub_field('link_da_ancora');
        if ($link_da_ancora): ?>
               <a href="<?php echo esc_url($link_da_ancora); ?>">
                  <strong>
                     <li><?php the_sub_field('nome_da_ancora'); ?></li>
                  </strong>
               </a>
               <?php endif; ?>
               <?php endwhile; ?>
            </ul>
            <?php endif; ?>
         </div>
         <div class="col-md-6">
            <?php if (get_field('imagem_principal')): ?>
            <img class="img-responsive" src="<?php the_field('imagem_principal'); ?>" />
            <?php endif; ?>
         </div>
      </div>
   </section>
   <section class="garantia">
      <div class="container">
         <?php if (get_field('conteudo_segundario')): ?>
         <?php while (has_sub_field('conteudo_segundario')): ?>
         <?php the_sub_field('titulo_secundario_01'); ?>
         <p><?php the_sub_field('briefing_secundario'); ?></p>
         <?php endwhile; ?>
         <?php endif; ?>
      </div>
   </section>
   <br/><br/>

   <section class="logos" id="table">
         <div class="container">
            <h2><?php the_field('titulo_parceiro_top'); ?></h2>
            <?php the_field('briefing_parceiros_top'); ?>
            <?php if (get_field('principais_parceiro_top')): ?>
            <?php while (has_sub_field('principais_parceiro_top')): ?>
            <div class="col-md-3">
               <img class="img-responsive center-block" src="<?php the_sub_field('imagem_do_icone'); ?>" alt="<?= $imagem_do_icone['title'] ?>  ">
               <span class="center-block" style="color: #36538f; font-size: 24px; text-align: center !important; font-family: unset; font-weight: bold;">
              </div>
            <?php endwhile; ?>
            <?php endif; ?>
         </div>
   </section>

  <section class="logos" id="table">
      <div class="container">
         <h2><?php the_field('titulo_parceiros_logo_2'); ?></h2>
         <?php the_field('briefing_da_tabela_de_precos_2'); ?> <br/>


         <?php

    $tabela2 = get_field('tabelas_precos_idosos_2');

    if ($tabela2 != ''): ?>
         <?php while (has_sub_field('tabelas_precos_idosos_2')): ?>
         <div class="col-md-3 dividi">
            <img class="img-responsive center-block" src="<?php the_sub_field('imagem_do_icone_2'); ?>" alt="<?= $imagem_do_icone_2['title'] ?>  ">
            <span class="center-block" style="color: #36538f; font-size: 24px; text-align: center !important; font-family: unset; font-weight: bold;">
            <?php the_sub_field('titulo_do_produto_2'); ?></span> <br/>
            <span class="partir-de">A partir de:</span> <br/>
            <span class="valor"><span class="obs">*</span><?php the_sub_field('valor_do_produto_2'); ?></span> &nbsp; <span>mensais</span>
            <?php
        $link_da_tabela_2 = get_sub_field('link_da_tabela_2');

        if ($link_da_tabela_2): ?>
            <a href="<?php echo esc_url($link_da_tabela_2); ?>">
            <button class="btn btn-info btn-sm center-block">
            Ver tabela de preços completa
            </button>
            </a> <br/>
            <?php endif; ?>
            <?php
        $link_da_rede_credenciada_2 = get_sub_field('link_da_rede_credenciada_2');

        if ($link_da_rede_credenciada_2): ?>
            <a href="<?php echo esc_url($link_da_rede_credenciada_2); ?>">
            <button class="btn btn-warning btn-sm center-block">
            Ver Rede Credenciada
            </button>
            </a>
            <?php endif; ?>
         </div>
         <?php endwhile; ?>
         <?php endif; ?>
         <br/><br/>

         <?php
    $link = get_field('botao_3');
    if ($link): ?>
                     <button class="btn btn-danger btn-sm center-block" data-toggle="modal" data-target="#myModal">Solicite um Orçamento</button>
         <?php endif; ?>

      </div>
   </section>

   <section class="logos" id="table">
      <div class="container">
         <h2><?php the_field('titulo_parceiros_logo_3'); ?></h2>
         <?php the_field('briefing_da_tabela_de_precos_3'); ?> <br/>



         <?php
    $tabela3 = get_field('tabelas_precos_idosos_3');

    if ($tabela3 != ''): ?>
         <?php while (has_sub_field('tabelas_precos_idosos_3')): ?>
         <div class="col-md-3 dividi">
            <img class="img-responsive center-block" src="<?php the_sub_field('imagem_do_icone_3'); ?>" alt="<?= $imagem_do_icone_3['title'] ?>  ">
            <span class="center-block" style="color: #36538f; font-size: 24px; text-align: center !important; font-family: unset; font-weight: bold;">
            <?php the_sub_field('titulo_do_produto_3'); ?></span> <br/>
            <span class="partir-de">A partir de:</span> <br/>
            <span class="valor"><span class="obs">*</span><?php the_sub_field('valor_do_produto_3'); ?></span> &nbsp; <span>mensais</span>
            <?php
        $link_da_tabela_3 = get_sub_field('link_da_tabela_3');

        if ($link_da_tabela_3): ?>
            <a href="<?php echo esc_url($link_da_tabela_3); ?>">
            <button class="btn btn-info btn-sm center-block">
            Ver tabela de preços completa
            </button>
            </a> <br/>
            <?php endif; ?>
            <?php
        $link_da_rede_credenciada_3 = get_sub_field('link_da_rede_credenciada_3');

        if ($link_da_rede_credenciada_3): ?>
            <a href="<?php echo esc_url($link_da_rede_credenciada_3); ?>">
            <button class="btn btn-warning btn-sm center-block">
            Ver Rede Credenciada
            </button>
            </a>
            <?php endif; ?>
         </div>
         <?php endwhile; ?>
         <?php endif; ?>
         <br/><br/>

         <?php
    $link = get_field('botao_4');
    if ($link): ?>
                     <button class="btn btn-danger btn-sm center-block" data-toggle="modal" data-target="#myModal">Solicite um Orçamento</button>
         <?php endif; ?>

      </div>
   </section>

   <section class="logos" id="table">
      <div class="container">
         <h2><?php the_field('titulo_parceiros_logo_4'); ?></h2>
         <?php the_field('briefing_da_tabela_de_precos_4'); ?> <br/>

         <?php

    $tabela4 = get_field('tabelas_precos_idosos_4');

    if ($tabela4 != ''): ?>
         <?php while (has_sub_field('tabelas_precos_idosos_4')): ?>
         <div class="col-md-3 dividi">
            <img class="img-responsive center-block" src="<?php the_sub_field('imagem_do_icone_3'); ?>" alt="<?= $imagem_do_icone_3['title'] ?>  ">
            <span class="center-block" style="color: #36538f; font-size: 24px; text-align: center !important; font-family: unset; font-weight: bold;">
            <?php the_sub_field('titulo_do_produto_3'); ?></span> <br/>
            <span class="partir-de">A partir de:</span> <br/>
            <span class="valor"><span class="obs">*</span><?php the_sub_field('valor_do_produto_3'); ?></span> &nbsp; <span>mensais</span>
            <?php
        $link_da_tabela_3 = get_sub_field('link_da_tabela_3');

        if ($link_da_tabela_3): ?>
            <a href="<?php echo esc_url($link_da_tabela_3); ?>">
            <button class="btn btn-info btn-sm center-block">
            Ver tabela de preços completa
            </button>
            </a> <br/>
            <?php endif; ?>
            <?php
        $link_da_rede_credenciada_3 = get_sub_field('link_da_rede_credenciada_3');

        if ($link_da_rede_credenciada_3): ?>
            <a href="<?php echo esc_url($link_da_rede_credenciada_3); ?>">
            <button class="btn btn-warning btn-sm center-block">
            Ver Rede Credenciada
            </button>
            </a>
            <?php endif; ?>
         </div>
         <?php endwhile; ?>
         <?php endif; ?>
         <br/><br/>
      </div>
   </section> -->


    <section>
        <div class="container">
            <h2><?php the_field('titulo_vantagens_de_contratar'); ?></h2>
            <?php the_field('briefing_vantagens_de_contratar'); ?>
            <br/>
            <br/>
            <?php if (get_field('vantagens_de_contratar')): ?>
                <?php while (has_sub_field('vantagens_de_contratar')): ?>
                    <div class="col-md-4">
                        <img class="img-responsive center-block1" src="<?php the_sub_field('logo_vantagem'); ?>"
                             alt="<?= $logo_vantagem['title'] ?> ">
                        <h3 class="vantagens"> <?php the_sub_field('titulo_da_vantagem'); ?></h3>
                        <p class="vantagens"><?php the_sub_field('conteudo_da_vantagem'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
<?php include __DIR__ . '/testeladingpage/depoimento-landing.php'; ?>

    <section class="logos" id="table">
        <div class="container">
            <h2><?php the_field('titulo_parceiro_top_brasil'); ?></h2>
            <?php the_field('briefing_parceiros_top_novo'); ?>
            <?php if (get_field('parceiros_top_brasil')): ?>
                <?php while (has_sub_field('parceiros_top_brasil')): ?>
                    <div class="col-md-2 dividi">
                        <img class="img-responsive center-block"
                             src="<?php the_sub_field('imagem_do_icone_parceiro'); ?>"
                             alt="<?= $imagem_do_icone_parceiro['title'] ?>  ">
                        <span class="center-block"
                              style="color: #36538f; font-size: 24px; text-align: center !important; font-family: unset; font-weight: bold;">
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>


    <div class="modal fade" id="myModal" tabindex="-1" role=".modal-dialo" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post"
                          action="https://www.topbrasilseguros.com.br/wp-content/themes/topbrasil/src/testeladingpage/enviar-seguro.php"
                          name="modalvalidate" id="envia" class="formulario">
                        <p style="font-size: 23px;" class="desconto"><?php the_field('titulo_do_formulario'); ?></p>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira o nome completo do segurado</label>
                                        <input type="text" name="nome" id="nome" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><br/>
                                        <label style="color: #fff;">Insira o e-mail</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira o celular</label>
                                        <input type="text" name="telefone" id="phone-number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira o peso</label>
                                        <input type="text" name="peso" id="peso" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br/>
                                        <label style="color: #fff;">Insira a altura</label>
                                        <input type="text" name="altura" id="altura" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira dia, mês e ano de nascimento</label>
                                        <input type="text" name="data" id="data" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira a Renda</label>
                                        <input type="text" name="renda" id="renda" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Insira a Profissão</label>
                                        <input type="text" name="profissao" id="profissao" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Detalhe a profissão ou aposentadoria</label>
                                        <input type="text" name="especificacao" id="especificacao" class="form-control"
                                               required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: #fff;">Você fuma ou fumou nos últimos 2 anos?</label>
                                        <input type="text" name="fumante" id="fumante" class="form-control">
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                     <div class="form-group">
                                         <div class="radio text-left">
                                             <label style="color: #fff; margin-left: -17px;">Responda com Sim ou Não se fuma ou já fumou nos
                                                 últimos
                                                 2 anos. <br/><br/>
                                                 <input type="checkbox" name="fumante" id="agree" value="sim"> Sim &nbsp;
                                                 <input type="checkbox" name="fumante" id="agree" value="nao" checked="">
                                                 Não

                                                 </span>
                                                 <br>
                                             </label>
                                         </div>
                                     </div>
                                 </div> -->

                                <div class="form-group">
                                    <input type="hidden" name="pagina" value="Seguro de Vida">
                                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                    <?php // Check if form was submitted:
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

                                        // Build POST request:
                                        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                                        $recaptcha_secret = '6LdorMIZAAAAAKal4e6Gy4jOqAmgCt0s0TY-FX4f';
                                        $recaptcha_response = $_POST['recaptcha_response'];

                                        // Make and decode POST request:
                                        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                                        $recaptcha = json_decode($recaptcha);

                                        // Take action based on the score returned:
                                        if ($recaptcha->score >= 0.5) {
                                            // Verified - send email
                                        } else {
                                            // Not verified - show form error
                                        }

                                    } ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" value="enviar" class="btn btn-danger center-block">Enviar</button>
                        <br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <br/>
                    <!--<p style="color: #ffffff;">*desconto na primeira mensalidade</p> -->
                </div>
            </div>
        </div>
    </div>
    <footer>
        <style type="text/css">
            button.btn.btn-info.btn-sm.center-block {
                font-size: 17px;
            }

            button.btn.btn-warning.btn-sm.center-block {
                font-size: 17px;
            }

            p.desconto {
                color: #ffffff;
                font-weight: bold;
                font-size: 22px;
                text-align: center;
            }
        </style>
<?php get_footer(); ?>
