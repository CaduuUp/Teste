<?php $v->layout("_theme"); ?>

<div class="app_formbox app_widget">
    <form class="app_form" action="<?= url("/edit"); ?>" method="post">
        <input type="hidden" name="update" value="true"/>

        <label>
            <span class="field icon-user">Nome:</span>
            <input class="radius" type="text" name="name" required
                   value="<?= $user->name; ?>"/>
        </label>

        <div class="label_group">
            <label>
                <span class="field icon-calendar">Nascimento:</span>
                <input class="radius" type="text" name="data_nasc" placeholder="yyyy/mm/" required
                       value="<?= $user->data_nasc; ?>"/>
            </label>

            <label>
                <span class="field icon-briefcase">CPF:</span>
                <input class="radius mask-doc" type="text" name="cpf" placeholder="Apenas números" required
                       value="<?= $user->cpf; ?>"/>
            </label>
        </div>

        <label>
            <span class="field icon-envelope">E-mail:</span>
            <input class="radius" type="email" name="email" placeholder="Seu e-mail de acesso" readonly
                   value="<?= $user->email; ?>"/>
        </label>

        <label>
            <span class="field icon-phone">Telefone:</span>
            <input class="radius mask-phone" type="tel" name="telefone" maxlength="15" required
                   value="<?= $user->telefone; ?>"/>
        </label>

        <div class="label_group">
            <label for="ativ">Ativo</label>
            <input type="radio" name="status" id="ativ" value="1" <?=($user->status) ?"checked":"";?>/>
            <label for="inatv">Inativo</label>
            <input type="radio" name="status" id="inatv" value="0" <?=($user->status)?"":"checked";?>/>
        </div>

        <div class="al-center">
            <div class="app_formbox_actions">
                <button type="submit" class="btn btn_inline radius transition icon-pencil-square-o">Atualizar</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Exibir mensagem de resposta
                // Aqui você pode atualizar a interface do usuário conforme necessário
            })
            .catch(error => console.error('Erro:', error));
    });
</script>
