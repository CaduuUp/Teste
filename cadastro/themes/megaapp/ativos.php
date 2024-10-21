<?php $v->layout("_theme"); ?>
<body>
<header class="app_form">
    <h1><?= ("Cadastros Ativos"); ?></h1>
    <form name="search" action="<?= url("/buscar"); ?>" method="post" enctype="multipart/form-data">
        <label>
            <input type="text" name="s" placeholder="Encontre um usuario:" required/>
        </label>
    </form>
</header>
<div class="x">
    <table class="app_form">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Status</th>
            <th scope="col">...</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($users)): ?>
            <tr>
                <td colspan="8">Nenhum usuário encontrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user->id); ?></td>
                    <td><?= htmlspecialchars($user->name); ?></td>
                    <td><?= htmlspecialchars($user->email); ?></td>
                    <td><?= htmlspecialchars($user->cpf); ?></td>
                    <td><?= htmlspecialchars($user->telefone); ?></td>
                    <td><?= htmlspecialchars($user->data_nasc); ?></td>
                    <td><?= htmlspecialchars($user->status); ?></td>
                    <td>
                        <a href="<?= url("/app/editar/{$user->id}"); ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= url("/app/remove/{$user->id}"); ?>" class="btn btn-danger">Excluir</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
