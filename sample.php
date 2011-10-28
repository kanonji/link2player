<?php
// vim: set ts=4 sw=4 sts=4 et ff=unix ft=php :
/*
Plugin Name: Sample
Version: 0.1
*/

define('SAMPLE_VERSION', '0.1');

function sample_head(){
    echo sprintf( '<link rel="stylesheet" href="%s?var=%s">%s', plugins_url( 'asset/lib/jquery.jplayer.2.1.0/blue.monday/jplayer.blue.monday.css', __FILE__  ), '2.1.0', PHP_EOL);
    echo sprintf(
'<script>
var sample = {};
sample.swfPath = "%s";
sample.extensions = {};
sample.extensions.audio = %s;
sample.extensions.video = %s;
</script>',
    plugins_url( 'asset/lib/jquery.jplayer.2.1.0/', __FILE__ ),
    json_encode(array('mp3', 'm4a', 'ogg', 'oga')),
    json_encode(array('flv', 'm4v', 'ogv'))
    );
}

// add javascript libraries
wp_enqueue_script('jquery');
wp_enqueue_script('jplayer', plugins_url('asset/lib/jquery.jplayer.2.1.0/jquery.jplayer.min.js', __FILE__), 'jquery', '2.1.0', true);
wp_enqueue_script('sample', plugins_url('asset/js/sample.js', __FILE__), 'jquery', '0.1', true);

// add filters and actions
add_action( 'wp_head', 'sample_head' );
