<?php
/*
Plugin Name: Link2Player
Version: 0.1
Description: Replace audio/video link with jPlayer( http://jplayer.org/ ). Most are written in JavaScript with jQuery such as selecting elements to replace.
Author: kanonji
*/
/*
MIT license
http://www.opensource.org/licenses/mit-license.php

Licenses for libraries in asset/lib directory belong to their own licenses.
*/

define('LINK2PLAYER_VERSION', '0.1');

function link2player_head(){
    echo sprintf( '<link rel="stylesheet" href="%s?var=%s">%s', plugins_url( 'asset/lib/jquery.jplayer.2.1.0/blue.monday/jplayer.blue.monday.css', __FILE__  ), '2.1.0', PHP_EOL);
    echo sprintf(
'<script>
var link2player = {};
link2player.swfPath = "%s";
link2player.extensions = {};
link2player.extensions.audio = %s;
link2player.extensions.video = %s;
</script>',
    plugins_url( 'asset/lib/jquery.jplayer.2.1.0/', __FILE__ ),
    json_encode(array('fla', 'm4a', 'oga', 'webma', 'ogg', 'mp3', 'wav')),
    json_encode(array('flv', 'm4v', 'ogv', 'webmv', 'mp4', 'webm'))
    );
}

// add javascript libraries
wp_enqueue_script('jquery');
wp_enqueue_script('jplayer', plugins_url('asset/lib/jquery.jplayer.2.1.0/jquery.jplayer.min.js', __FILE__), 'jquery', '2.1.0', true);
wp_enqueue_script('link2player', plugins_url('asset/js/link2player.js', __FILE__), 'jquery', '0.1', true);

// add filters and actions
add_action( 'wp_head', 'link2player_head' );
// vim: set ts=4 sw=4 sts=4 et ff=unix ft=php :
