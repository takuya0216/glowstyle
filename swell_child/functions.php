<?php

/* 子テーマのfunctions.phpは、親テーマのfunctions.phpより先に読み込まれることに注意してください。 */


/**
 * 親テーマのfunctions.phpのあとで読み込みたいコードはこの中に。
 */
// add_filter('after_setup_theme', function(){
// }, 11);


/**
 * 子テーマでのファイルの読み込み
 */
add_action('wp_enqueue_scripts', function() {

	$timestamp = date( 'Ymdgis', filemtime( get_stylesheet_directory() . '/style.css' ) );
	wp_enqueue_style( 'child_style', get_stylesheet_directory_uri() .'/style.css', [], $timestamp );

	/* その他の読み込みファイルはこの下に記述 */
	$timestamp = date( 'Ymdgis', filemtime( get_stylesheet_directory() . '/myscript.js' ) );
	wp_enqueue_script('myjs', get_stylesheet_directory_uri() . '/myscript.js', [], $timestam );

}, 11);

//テーマ用JS
function myjs_enqueue(){

  //ブロックスタイルJS
  $timestamp = date( 'Ymdgis', filemtime( get_stylesheet_directory() . '/mystyle.js' ) );
  wp_enqueue_script('myjs-style',get_stylesheet_directory_uri() . '/mystyle.js',
  array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
  $timestamp);
}
add_action('enqueue_block_editor_assets', 'myjs_enqueue');

function child_style_both(){

  $timestamp = date( 'Ymdgis', filemtime( get_stylesheet_directory() . '/style_both.css' ) );
  //フロントとエディタの両方に適応するCSS
  wp_enqueue_style('child-style-both', get_stylesheet_directory_uri() . '/style_both.css', [], $timestamp);
  //AdobeFonts
  //wp_enqueue_style('mytheme-adobefonts', 'https://use.typekit.net/ril1mnz.css', array(), null);
  //Google Fonts
  //wp_enqueue_style('mytheme-googlefonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Noto+Sans+JP:wght@300;400;500;700&display=swap', [], null);

}
add_action('enqueue_block_assets', 'child_style_both');

/*ショートコード*/
/*ショートコードを使ったphpファイルの呼び出し方法*/
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_stylesheet_directory() . "/$file.php");
    return ob_get_clean();
}
add_shortcode('include_myphp', 'Include_my_php');

/*投稿ページタイトル上にHTML挿入フック
 */
/*
add_action('swell_before_post_head', function( $post_id ) { ?>
ここにHTMLを書く
<?php });
*/

/**
 * headerロゴ差替え
*/
add_filter('swell_head_logo', function($logo) {
    return S_DIRE_URI . '/img/logo.svg';
});

/*トップページのみ、body直下にHTML挿入*/
add_action( 'wp_body_open', function() {
	if(is_front_page()){
		echo do_shortcode('[blog_parts id="71"]');
	}
});
