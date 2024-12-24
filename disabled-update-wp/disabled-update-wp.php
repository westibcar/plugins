<?php
/**
 * Plugin Name: Desativa Atualizações Automáticas
 * Plugin URI: https://www.exemplo.com/desativa-atualizacoes
 * Description: Desativa as atualizações automáticas de plugins, temas e o núcleo do WordPress, além de remover as notificações de atualização.
 * Version: 1.0
 * Author: Seu Nome
 * Author URI: https://www.exemplo.com
 * License: GPL2
 */

// Impede a execução do código fora do ambiente WordPress
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Desativa as atualizações automáticas de plugins
add_filter('auto_update_plugin', '__return_false');

// Desativa as atualizações automáticas de temas
add_filter('auto_update_theme', '__return_false');

// Desativa as atualizações automáticas do núcleo
add_filter('auto_update_core', '__return_false');

// Remove notificações de atualizações de plugins na área administrativa
remove_action('admin_notices', 'update_nag', 3);

// Desativa a verificação de atualizações de plugins
remove_action('load-update.php', 'wp_update_plugins');
add_filter('site_transient_update_plugins', function($value) { return null; });

// Desativa a verificação de atualizações de temas
remove_action('load-update.php', 'wp_update_themes');
add_filter('site_transient_update_themes', function($value) { return null; });
