<?php
/*
Plugin Name: Fun&ccedil;&otilde;es Globais de Brasa.art.br
Description: As mais importantes funcionalidades para toda rede de Sites.
Version: 0.1
License: GPL v3
Author: Brasa.art.br
Author URI: brasa.art.br
*/


// Mostrar Mensagem de urg�ncia

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
        echo 'Desenvolvido com <a href=http://wordpress.org/>WordPress</a> por <a href=http://www.brasa.art.br>Brasa Design e Tecnologia</a>.';
}
add_filter('admin_footer_text', 'custom_admin_footer');


?>
