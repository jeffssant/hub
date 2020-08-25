<?php

/**
 * 
 * Plugin Name: Teste Vocacional DB
 * Description: Tabela dos dados de teste vocacional
 */

function showMenu() {
    $dir = plugin_dir_path(__FILE__);
    add_menu_page('Resultado Teste', 'Resultado Teste', 
        'read', $dir.'/index.php', null, 'dashicons-media-spreadsheet');
}

add_action('admin_menu', 'showMenu');
