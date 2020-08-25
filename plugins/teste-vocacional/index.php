<?php
    global $wpdb;
    $data = $wpdb->get_results('select * from teste_vocacional_usuarios');
    $link = plugin_dir_url(__FILE__) . 'extract-data.php';
?>
<section class="wrap">
    <h1>
        Lista de dados do teste vocacional
        <p class="search-box">
            <a href="<?=$link?>" class="button button-primary"> Download dos dados </a>
        </p>
    </h1>
    <br>
    <table class="wp-list-table widefat fixed striped posts cf7d-admin-table vertical">
        <thead>
            <th> Nome </th>
            <th> Email </th>
            <th> Senha </th>
            <th> Estado </th>
            <th> Cidade </th>
            <th> Resultado do Teste </th>
            <th> Data </th>
        </thead>
        <tbody>
            <?php foreach ($data as $user): ?>
            <tr>
                <td> <?=$user->nome?> </td>
                <td> <?=$user->email?> </td>
                <td> <?=$user->senha?> </td>
                <td> <?=$user->estado?> </td>
                <td> <?=$user->cidade?> </td>
                <td> <?=$user->resultado?> </td>
                <td> <?=date('d/m/Y', strtotime($user->dt_cadastro))?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>