<?php if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_linda',
		'title' => 'Linda',
		'fields' => array (
			array (
				'key' => 'field_57734d2922d2c',
				'label' => 'Link da matéria',
				'name' => 'link_da_materia',
				'type' => 'text',
				'instructions' => 'Cole o link usando http:// ou https:// no começo',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57734d5622d2d',
				'label' => 'Texto inicial',
				'name' => 'texto_inicial',
				'type' => 'textarea',
				'instructions' => 'Escreva o texto de introdução da seção "Linda"',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-linda.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
