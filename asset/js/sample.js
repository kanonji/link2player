/* vim: set ts=2 sw=2 sts=2 et ff=unix ft=javascript : */
jQuery(function(){
  var $ = jQuery;
  var swfPath = sample.swfPath;;
  var $content = $('.entry-content');
  var extensions = {};
  $.each(sample.extensions.audio, function(){
    extensions[this] = true;
  });
  $.each(sample.extensions.video, function(){
    extensions[this] = false;
  });
  $.each(extensions, function(ext, isAudio){
    $('a[href$='+ext+']').each(function( index ){
      var $source = $(this);
      var $interface, $player;
      var id = [ext, index].join('_');
      var media = {};
      var supplied;
      media[ext] = $source.attr('href');
      if ( isAudio ) {
        $interface = writeJplayerInterfaceAudio(id);
        $player = $interface.prev('div.jp-player');
        $source.after( $player );
        supplied = sample.extensions.audio.join(',');
      } else {
        $interface = writeJplayerInterfaceVideo(id);
        $player = $interface.find('div.jp-player');
        supplied = sample.extensions.video.join(',');
      }
      $source.after( $interface );
      $player.jPlayer({
        ready: function(event){
          $(this).jPlayer( 'setMedia', media);
          $source.remove();
        },
        swfPath: swfPath,
        cssSelectorAncestor: "#jp_container_"+id,
        supplied: supplied,
        //solution: 'flash, html',
        //warningAlerts: true.
        errorAlerts: true,
      });
    });
  });

  function writeJplayerInterfaceAudio(id){
    var $container = $('<div id="jp_container_'+id+'" class="jp-audio"><div class="jp-type-single"></div></div>');
    var $player = $('<div class="jp-player"></div>').insertBefore($container);
    var $typeSingle = $($container.find('div.jp-type-single'));
    var $interface = $('<div class="jp-gui jp-interface"></div>').appendTo($typeSingle);
    var $controls = $('<ul class="jp-controls"></ul>').appendTo($interface);
    var $play = $('<li><a href="#" class="jp-play" tabindex="1" title="play">play</a></li>').appendTo($controls);
    var $pause = $('<li><a href="#" class="jp-pause" tabindex="1" title="pause">pause</a></li>').appendTo($controls);
    var $stop = $('<li><a href="#" class="jp-stop" tabindex="1" title="stop">stop</a></li>').appendTo($controls);
    var $mute = $('<li><a href="#" class="jp-mute" tabindex="1" title="mute">mute</a></li>').appendTo($controls);
    var $unmute = $('<li><a href="#" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>').appendTo($controls);
    var $volumeMax = $('<li><a href="#" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>').appendTo($controls);
    var $progress = $('<div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div>').appendTo($interface);
    var $volumeBar = $('<div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div>').appendTo($interface);
    var $timeHolder = $('<div class="jp-time-holder"></div>').appendTo($interface);
    var $currentTime = $('<div class="jp-current-time"></div>').appendTo($timeHolder);
    var $duration = $('<div class="jp-duration"></div>').appendTo($timeHolder);
    var $toggles = $('<ul class="jp-toggles"></ul>').appendTo($interface);
    var $repeat = $('<li><a href="#" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>').appendTo($toggles);
    var $repeatOff = $('<li><a href="#" class="jp-repeat-off" tabindex="1" title="repeat off">repeat </a></li>').appendTo($toggles);
    var $title = $('<div class="jp-title"><ul><li></li></ul></div>').appendTo($typeSingle);
    var $noSolution = $('<div class="jp-no-solution">foo</div>').appendTo($typeSingle);
    return $container;
  }

  function writeJplayerInterfaceVideo(id){
    var $container = $('<div id="jp_container_'+id+'" class="jp-video"><div class="jp-type-single"></div></div>');
    var $typeSingle = $($container.find('div.jp-type-single'));
    var $player = $('<div class="jp-player"></div>').appendTo($typeSingle);
    var $gui = $('<div class="jp-gui"></div>').appendTo($typeSingle);
    var $noSolution = $('<div class="jp-no-solution">foo</div>').appendTo($typeSingle);
    var $videoPlay = $('<div class="jp-video-play"><a href="#" class="jp-video-play-icon" tabindex="1" title="play">play</a></div>').appendTo($gui);
    var $interface = $('<div class="jp-interface"></div>').appendTo($gui);
    var $progress = $('<div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div>').appendTo($interface);
    var $currentTime = $('<div class="jp-current-time"></div>').appendTo($interface);
    var $duration = $('<div class="jp-duration"></div>').appendTo($interface);
    var $title = $('<div class="jp-title"><ul><li></li></ul></div>').appendTo($interface);
    var $controlsHolder = $('<div class="jp-controls-holder"></div>').appendTo($interface);
    var $controls = $('<ul class="jp-controls"></ul>').appendTo($controlsHolder);
    var $play = $('<li><a href="#" class="jp-play" tabindex="1" title="play">play</a></li>').appendTo($controls);
    var $pause = $('<li><a href="#" class="jp-pause" tabindex="1" title="pause">pause</a></li>').appendTo($controls);
    var $stop = $('<li><a href="#" class="jp-stop" tabindex="1" title="stop">stop</a></li>').appendTo($controls);
    var $mute = $('<li><a href="#" class="jp-mute" tabindex="1" title="mute">mute</a></li>').appendTo($controls);
    var $unmute = $('<li><a href="#" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>').appendTo($controls);
    var $volumeMax = $('<li><a href="#" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>').appendTo($controls);
    var $volumeBar = $('<div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div>').appendTo($controlsHolder);
    var $toggles = $('<ul class="jp-toggles"></ul>').appendTo($controlsHolder);
    var $fullScreen = $('<li><a href="#" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>').appendTo($toggles);
    var $restoreScreen = $('<li><a href="#" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>').appendTo($toggles);
    var $repeat = $('<li><a href="#" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>').appendTo($toggles);
    var $repeatOff = $('<li><a href="#" class="jp-repeat-off" tabindex="1" title="repeat off">repeat </a></li>').appendTo($toggles);
    return $container;
  }
});