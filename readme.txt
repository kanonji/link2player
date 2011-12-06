=== Link2Player ===
Contributors: kanonji
Tags: audio, video, player, jquery, mp3, mp4, ogg, flv
Requires at least: 3.2
Tested up to: 3.2.1
Stable tag: 0.2

Replace audio/video link with jPlayer( http://jplayer.org/ ). Most are written in JavaScript with jQuery such as selecting elements to replace.

== Description ==

= Features =

&lt;a href="http://example.com/path/to/audio-or-video.mp4"&gt;Example audio or video&lt;/a&gt;

If you write a link like above, Link2Player replaces it with jPlayer.

= Supported audio =

.m4a .mp3 .ogg .oga .fla .wav .webma

= Supported video =

.m4v .mp4 .flv .ogv .webmv .webm

Playable or not belongs to browser accessing your blog. mp3, m4a, m4v, mp4 may be playable in most browsers.

= How it works =

1. Load javascript and css in the Plugin part(php)
2. Select link for audio/viode(jQuery)
3. Replace links with jPlayer(jQuery)

Selecting links by extension like $('a[href$=mp3]'). If there is a query string( ?foo=bar ) or extension not supported, Link2Player does not work.
Most are written in JavaScript. If your theme loads old jQuery in it's own accord, Link2Player may not work. I have not tried with any old jQuery.

= Notes =

* jQuery: included in the Wordpress.
* jPlayer: 2.1.0 included in Link2Player plugin.
* Blue Monday skin: included in Link2Player plugin.
* Player design is not customizable.

== Changelog ==

= 0.2 =
* Not to load javascript on admin.

= 0.1 =
* Released.
