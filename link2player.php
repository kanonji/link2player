<?php
/*
Plugin Name: Link2Player
Plugin URI: https://github.com/kanonji/link2player
Version: 0.2
Description: Replace audio/video link with jPlayer( http://jplayer.org/ ). Most are written in JavaScript with jQuery such as selecting elements to replace.
Author: kanonji
Author URI: http://twitter.com/kanonji
*/
/*
MIT license
http://www.opensource.org/licenses/mit-license.php

Licenses for libraries in asset/lib directory belong to their own licenses.
*/

define('LINK2PLAYER_VERSION', '0.2');
define('LINK2PLAYER_URL', plugin_dir_url(null).basename(dirname(__FILE__)));

function link2player_head(){
    echo sprintf( '<link rel="stylesheet" href="%s?ver=%s">%s', LINK2PLAYER_URL.'/asset/style/link2player.css', LINK2PLAYER_VERSION, PHP_EOL);
    echo sprintf( '<link rel="stylesheet" href="%s?ver=%s">%s', LINK2PLAYER_URL.'/asset/lib/jquery.jplayer.2.1.0/blue.monday/jplayer.blue.monday.css', '2.1.0', PHP_EOL);
    echo sprintf(
'<script>
var link2player = {};
link2player.swfPath = "%s";
link2player.extensions = {};
link2player.extensions.audio = %s;
link2player.extensions.video = %s;
</script>',
    LINK2PLAYER_URL.'/asset/lib/jquery.jplayer.2.1.0/',
    json_encode(array('fla', 'm4a', 'oga', 'webma', 'ogg', 'mp3', 'wav')),
    json_encode(array('flv', 'm4v', 'ogv', 'webmv', 'mp4', 'webm'))
    );
}

if (! is_admin()) {
    // add javascript libraries
    wp_enqueue_script('jquery');
    wp_enqueue_script('jplayer', LINK2PLAYER_URL.'/asset/lib/jquery.jplayer.2.1.0/jquery.jplayer.min.js', 'jquery', '2.1.0', true);
    wp_enqueue_script('link2player', LINK2PLAYER_URL.'/asset/js/link2player.js', 'jquery', '0.1', true);
}

// add filters and actions
add_action( 'wp_head', 'link2player_head' );
// vim: set ts=4 sw=4 sts=4 et ff=unix ft=php :
