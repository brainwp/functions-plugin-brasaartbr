<?php
$odin_theme_options = new Brasa_Plugin_Options( 
    'brasa-infos', // Slug/ID da página (Obrigatório)
    'Informações do site', // Titulo da página (Obrigatório)
    'manage_options' // Nível de permissão (Opcional) [padrão é manage_options]
);
$odin_theme_options->set_tabs(
    array(
        array(
            'id' => 'brasa_infos_geral', // ID da aba e nome da entrada no banco de dados.
            'title' => __( 'Informações do site', 'odin' ), // Título da aba.
        ),
    )
);
$odin_theme_options->set_fields(
    array(
        'general_section' => array(
            'tab'   => 'brasa_infos_geral', // Sessão da aba odin_general
            'title' => '',
            'fields' => array(
                array(
                    'id' => 'brasa_infos_show',
                    'label' => 'Mostrar informações publicamente no site da Brasa?',
                    'type' => 'checkbox',
                    'default' => '',
                    //'description' => __( 'Descrition Example', 'odin' )
                ),
                array(
                    'id' => 'brasa_infos_email',
                    'label' => 'Email para contato',
                    'type' => 'text',
                    'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
                    'type'     => 'email',
                    //'required' => 'required',
                    'class'    => 'regular-text',
                    //'styles'   => 'background: #444;'
                    )
                ),
                array(
                    'id' => 'brasa_infos_tel',
                    'label' => 'Telefone para contato',
                    'type' => 'text'
                )
            )
        ),
    )
);
