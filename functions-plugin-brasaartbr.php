<?php
/*
Plugin Name: Fun&ccedil;&otilde;es Globais de Brasa.art.br
Description: As mais importantes funcionalidades para toda rede de Sites.
Version: 0.1
License: GPL v3
Author: Brasa.art.br
Author URI: brasa.art.br
*/


// Mostrar Mensagens Administrativas

function showMessage($message, $errormsg = false) {
	if ($errormsg) {
		echo '<div id="message" class="updated fade">';
	}
	else {
		echo '<div id="message" class="updated">';
	}
	echo "<p>$message</p></div>";
} 

function showAdminMessages() {

	$link = '<a href="http://suporte.brasa.art.br/" target="_blank">Suporte</a>';
    showMessage("Acesse a página de $link para obter ajuda.
	<!-- Mensagem de alerta no Painel Administrativo de todos os sites da Nuvem da Brasa -->", true);
}

add_action('admin_notices', 'showAdminMessages');

// FILTRO PARA TROCAR CERTAS PALAVRAS POR LINKS

// function replace_wordswithlinks($text){
//	$replace = array(
	// 'WORD TO REPLACE' => 'REPLACE WORD WITH THIS'
//	'WordPress' => '<a href="http://brasa.art.br/sobre-wordpress/">WordPress</a>'
//	);
//	$text = str_replace(array_keys($replace), $replace, $text);
//	return $text;
//}
// add_filter('the_content', 'replace_wordswithlinks');
// add_filter('the_excerpt', 'replace_wordswithlinks');

// Personaliza o rodapé do admin
function custom_admin_footer() {
        echo 'Desenvolvido com <a href=http://br.wordpress.org/>WordPress</a> por <a href=http://www.brasa.art.br>Brasa Design e Tecnologia</a>.';
}
add_filter('admin_footer_text', 'custom_admin_footer');

// Função para colocar o WP em modo de manutenção

// function enable_maintenance_mode() {
// if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
// wp_die('Nuvem Brasa em manutenção, volte daqui alguns minutos por favor.');
// }
// }
// add_action('get_header', 'enable_maintenance_mode');

require_once plugin_dir_path( __FILE__ ) . 'inc/class-options.php';
require plugin_dir_path( __FILE__ ) . 'inc/options.php';
require plugin_dir_path( __FILE__ ) . 'inc/dashboard.php';
function brasa_add_theme_caps() {
    // gets the author role
    $role = get_role( 'editor' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'edit_theme_options' );
    $role->add_cap( 'manage_options' );
 }
add_action( 'admin_init', 'brasa_add_theme_caps');
function brasa_get_user_role() {
    global $current_user;

    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);

    return $user_role;
}
add_action( 'admin_menu', 'brasa_adjust_the_wp_menu', 999 );
function brasa_adjust_the_wp_menu() {
	if(brasa_get_user_role() == 'editor'){
		remove_menu_page( 'tools.php' );
		remove_submenu_page( 'options-general.php', 'options-media.php' );
		remove_submenu_page( 'options-general.php', 'options-permalink.php' );
	}
}
?>
