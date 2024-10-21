<?php $v->layout("_theme"); ?>

    <!--FEATURED-->
    <article class="home_featured">
        <div class="home_featured_content container content">
            <header class="home_featured_header">
                <h1>Vamos começar!</h1>
                <p>Cadastre-se e veja se o pai esta bom mesmo</p>
                <p><span data-go=".home_optin"
                         class="home_featured_btn gradient gradient-green gradient-hover radius transition icon-check-square-o">Criar
                    minha conta.</span></p>
                <p class="features">| Rápido | Simples |</p>
            </header>
        </div>

        <div class="home_featured_app">
            <img src="<?= theme("/assets/images/home-app.jpg"); ?>" alt="CafeControl" title="CafeControl"/>
        </div>
    </article>

    <!--FEATURES-->
    <div class="home_featured_app">
        <section class="container content">
            <header class="home_features_header">
                <h2>O que você pode fazer com o MegaZorde</h2>
                <p>É fácil, só se cadastrar!</p>
            </header>
                <div>
                <article class="radius">
                    <header>
                        <img alt="Controle e relatórios" title="Controle e relatórios"
                             src="<?= theme("/assets/images/home_control.jpg"); ?>"/>
                        <h3>Dilera e Coach</h3>
                        <p>Dilera da apavoro em coach ao vivo!</p>
                    </header>
                </article>
            </div>
        </section>
    </div>

    <!--OPTIN-->
    <article class="home_optin">
        <div class="home_optin_content container content">
            <header class="home_optin_content_flex">
                <h2>Cadastre-se no MegaZorde</h2>
                <p>Receber e pagar é uma tarefa comum do dia a dia, o MegaZorde é um gerenciador de dinheiro simples,
                    me de,
                    e gratuito para ajudar eu nessa tarefa.</p>
                <p>Pronto para começar a cadastrar?</p>
            </header>

            <div class="home_optin_content_flex">
                <span class="icon icon-check-square-o icon-notext"></span>
                <h4>Crie sua conta gratuitamente mas se quiser to aceitando dinheiro:</h4>
                <form action="<?= url("/cadastrar"); ?>" method="post" enctype="multipart/form-data">
                    <div class="ajax_response"><?= flash(); ?></div>
                    <?= csrf_input(); ?>
                    <input type="text" name="name" placeholder="Nome Completo:"/>
                    <input type="email" name="email" placeholder="E-mail:"/>
                    <input type="text" class="radius mask-doc" name="cpf" maxlength="14" placeholder="CPF:"/>
                    <input type="tel" class="radius mask-phone" name="telefone" maxlength="15" placeholder="Telefone:"/>
                    <input type="date" name="data_nasc" placeholder="Data Nascimento:"/>
                    <input type="password" name="password" placeholder="Senha:"/>

                    <button class="radius transition gradient gradient-green gradient-hover">Criar minha conta</button>
                </form>
            </div>
        </div>
    </article>

    <!--VIDEO-->
    <article class="home_video">
        <div class="home_video_content container content">
            <header>
                <h2>Descubra o Dilera</h2>
                <span data-modal=".home_video_modal" class="icon-play-circle-o icon-notext transition"></span>
            </header>
        </div>

        <div class="home_video_modal j_modal_close">
            <div class="home_video_modal_box">
                <div class="embed">
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/<?= $video; ?>?rel=0&amp;showinfo=0"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </article>

