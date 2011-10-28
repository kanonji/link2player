<?php
// vim: set ts=4 sw=4 sts=4 et ff=unix ft=php :
/*
Plugin Name: Sample
*/

function replace_audio($content){
    $pattern = "/<a ([^=]+=['\"][^\"']+['\"] )*href=['\"](([^\"']+\.(mp3|wav|ogg)))['\"]( [^=]+=['\"][^\"']+['\"])*>([^<]+)<\/a>/i";
    $replacement = 'foo';
    //return preg_replace($pattern, $replacement, $content);
    return $content;
}

function replace_video($content){
    $pattern = "/<a ([^=]+=['\"][^\"']+['\"] )*href=['\"](([^\"']+\.(mp4|flv)))['\"]( [^=]+=['\"][^\"']+['\"])*>([^<]+)<\/a>/i";
    $replacement = 'foo';
    return preg_replace($pattern, $replacement, $content);
}

function sample_head(){
    echo sprintf( '<link rel="stylesheet" href="%s?var=%s">%s', plugins_url( 'asset/lib/jquery.jplayer.2.1.0/blue.monday/jplayer.blue.monday.css', __FILE__  ), '2.1.0', PHP_EOL);
}

// add javascript libraries
wp_enqueue_script('jquery');
wp_enqueue_script('jplayer', plugins_url('asset/lib/jquery.jplayer.2.1.0/jquery.jplayer.min.js', __FILE__), 'jquery', '2.1.0', true);
wp_enqueue_script('sample', plugins_url('sample.js', __FILE__), 'jquery', '0.1', true);

// add filters and actions
add_filter( 'the_content', 'replace_audio' );
add_filter( 'the_content', 'replace_video' );
add_action( 'wp_head', 'sample_head' );
