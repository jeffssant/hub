<?php
// Header
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=teste-vocacional.csv");
header("Pragma: no-cache");
header("Expires: 0");

require '../../../wp-config.php';

global $wpdb;

// CSV Header
echo "Nome;Email;Senha;Estado;Cidade;Resultado do Teste;Data\n";

$data = $wpdb->get_results('select * from teste_vocacional_usuarios');
foreach ($data as $user) {
    $dt_cadastro = date('d/m/Y', strtotime($user->dt_cadastro));
    echo "{$user->nome};{$user->email};{$user->senha};{$user->estado};"
        . "{$user->cidade};{$user->resultado};{$dt_cadastro}\n";
}

exit;
