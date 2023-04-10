<?php
define( 'THEME_PATH', get_template_directory_uri() );
define( 'CONTACT_ADRESS', get_field('contact_adress', 'options') );
define( 'CONTACT_SHEDULE', get_field('contact_shedule', 'options') );
define( 'CONTACT_PHONES', get_field('contact_phones', 'options') );
define( 'CONTACT_SOCIALS', get_field( 'contacts_socials', 'options' ) );
define( 'COMPANY_DETAILS', get_field( 'company_details', 'options' ) );
define( 'ADMIN_EMAIL', get_field('send_email', 'options') ? get_field('send_email', 'options') : get_bloginfo( 'admin_email' ) );
define( 'MAP_COORD', get_field('map_coord','options')? explode(', ', get_field('map_coord','options')) : array(53.196485, 45.020035) );
define( 'USER_SETTINGS', array(
  'THEME_PATH' => THEME_PATH,
  'MAP_COORD' => MAP_COORD,
  'AJAX_URL' => admin_url( 'admin-ajax.php?action=send_mail' ),
) );

function get_style() {
  $ver = '?v=1.0.2';
  wp_enqueue_style('style', THEME_PATH );
  wp_enqueue_style( 'vendor', THEME_PATH.'/style/vendor-bundle.css' );
  wp_enqueue_style( 'main', THEME_PATH.'/style/main.css'.$ver );
  // wp_enqueue_style( 'custom', THEME_PATH.'/style/custom.css'.$ver );
}

function get_scripts() {
  $ver = '?v=1.0.1';
  wp_enqueue_script( 'vendor', THEME_PATH.'/js/vendor-bundle.js', null, null, false);
  wp_enqueue_script( 'main', THEME_PATH.'/js/main.js'.$ver, null, null, false);
  wp_localize_script( 'vendor', 'WP_Options', USER_SETTINGS );
}

function add_type_es6_module( $tag, $handle, $src ) {
  if ( 'main' === $handle ) {
    return str_replace( '<script ', '<script type="module"', $tag );
  }
  return $tag;
}

function filter_plugin_updates( $value ) {
  unset( $value->response['advanced-custom-fields-pro-master/acf.php'] );
	return $value;
}

function add_setting_site() {
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' 	=> 'Настройки сайта',
      'menu_title'	=> 'Настройки сайта',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
      'page_title' 	=> 'Сторонний код',
      'menu_title'	=> 'Сторонний код',
      'parent_slug'	=> 'theme-general-settings',
    ));
  }
}

function get_image_url_fallback($url) {
  return $url ? $url : THEME_PATH.'/img/no-photo.svg';
}

function theme_register_menus() {
	register_nav_menu( 'header-menu', 'Главное меню' );
}

function get_phone($phone_str, $class_name = null) {
  if (!$phone_str) return;
  $selector = $class_name ? "class=\"$class_name\"" : '';
  $phone_href = preg_replace('/[^+\d]/', '', $phone_str);
  return "<a $selector href=\"tel:$phone_href\">$phone_str</a>";
}

function get_email($email_str, $class_name = null) {
  if (!$email_str) return;
  $selector = $class_name ? "class=\"$class_name\"" : '';
  return "<a $selector href=\"mailto:$email_str\">$email_str</a>";
}

function get_format_date($date) {
  $year = date_parse($date)['year'];
  $month = date_parse($date)['month'] < 10 ? '0'.date_parse($date)['month'] : date_parse($date)['month'];
  $day = date_parse($date)['day'] < 10 ? '0'.date_parse($date)['day'] : date_parse($date)['day'];
  return "{$year}-{$month}-{$day}";
}

function send_mail() {
	$headers = array(
	  'From: Salus <info@'.$_SERVER['HTTP_HOST'].'>',
	  'content-type: text/html',
	);

	$to = ADMIN_EMAIL;

	$subject = 'Обратная связь с сайта '.$_SERVER['HTTP_HOST'];
  $frame_color_theme = get_field('frame_color_theme', 'options') ? get_field('frame_color_theme', 'options') : '#e2e2e2';
  $string_color_theme = get_field('string_color_theme', 'options') ? get_field('string_color_theme', 'options') : '#f2f2f2';

  $c = true;
  // CSS стили таблицы
  $style_table = '
    width: 100%;
    border-collapse: collapse;
  ';
  // CSS стили строки таблицы
  $style_tr = '
    background-color: #f2f2f2;
  ';
  // CSS стили ячейки таблицы
  $style_td = '
    padding: 10px;
    border: #e2e2e2 2px solid;
    vertical-align: top;
  ';

  // Перебор всех заполненных полей форм и запись в переменную $message
  foreach ( $_POST as $key => $value ) {
    if ( $value != "" ) {
      $message .= "
      " . ( ($c = !$c) ? '<tr>':'<tr style="'.$style_tr.'">' ) . "
        <td style='".$style_td."'><b>$key</b></td>
        <td style='".$style_td."'>$value</td>
      </tr>
      ";
    }
  }
  // Создание "тела" письма
  $body = "<table style='".$style_table."'>$message</table>";
  wp_mail( $to, $subject, $body, $headers);
  wp_die();
}

add_action( 'wp_enqueue_scripts', 'get_style' );
add_action( 'wp_footer', 'get_scripts' );
add_action( 'after_setup_theme', 'theme_register_menus' );
add_action( 'wp_ajax_send_mail', 'send_mail' );
add_action( 'wp_ajax_nopriv_send_mail', 'send_mail' );

add_filter( 'script_loader_tag', 'add_type_es6_module', 10, 3 );
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

add_setting_site();
