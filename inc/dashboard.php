<?php
function brasa_infos_dashwidget_render(){
	echo '<h4><b>Já configurou as informações do seu site na nuvem da Brasa?</b></h4>';
	echo '<a href="'.get_admin_url().'options-general.php?page=brasa-infos">Clique aqui para configurar</a>';
	echo '<br><h4><b>Precisa de suporte?</b></h4>';
	echo '<a href="http://suporte.brasa.art.br/">Acesse a página de Suporte para obter ajuda</a>';

}
function brasa_infos_dashwidget() {
 	wp_add_dashboard_widget( 'brasa_infos_dashwidget', 'Seja bem-vindo a nuvem da Brasa!', 'brasa_infos_dashwidget_render' );
} 
add_action( 'wp_dashboard_setup', 'brasa_infos_dashwidget' );
