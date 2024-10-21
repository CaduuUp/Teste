<?php $v->layout("_theme"); ?>

<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Cadastre-se</h1>
            <p>Já tem uma conta? <a title="Fazer login!" href="<?= url("/entrar"); ?>">Fazer login!</a></p>
        </header>

        <form class="auth_form" action="<?= url("/cadastrar"); ?>" method="post" enctype="multipart/form-data">
            <div class="ajax_response"><?= flash(); ?></div>
            <?= csrf_input(); ?>

            <label>
                <div><span class="icon-user">Nome:</span></div>
                <input type="text" name="name" placeholder="Nome Completo:" required/>
            </label>

            <label>
                <div><span class="icon-envelope">Email:</span></div>
                <input type="email" name="email" placeholder="Informe seu e-mail:" required/>
            </label>

            <label>
                <div><span class="field icon-briefcase">CPF:</span></div>
                <input type="text"  class="radius mask-doc" name="cpf" maxlength="14" placeholder="Informe seu CPF:" required/>
            </label>

            <label>
                <div><span class="icon-phone">Telefone:</span></div>
                <input type="text" class="radius mask-phone" name="telefone" maxlength="15" placeholder="Informe seu telefone:" required/>
            </label>

            <label>
                <div><span class="icon-calendar">Data de Nascimento:</span></div>
                <input type="date" name="data_nasc" placeholder="Informe sua data de nascimento:" required/>
            </label>

            <label>
                <div class="unlock-alt"><span class="icon-unlock-alt">Senha:</span></div>
                <input type="password" name="password" placeholder="Informe sua senha:" required/>
            </label>


            <button class="auth_form_btn transition gradient gradient-green gradient-hover">Criar conta</button>
        </form>
    </div>
</article>