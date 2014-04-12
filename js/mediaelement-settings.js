player = new MediaElementPlayer('video');
jQuery(document).ready(function($){
    $('video').on("play", function() {
        player.enterFullScreen();
        var i = null;
        $('video').mousemove(function() {
            clearTimeout(i);
            player.showControls();
            i = setTimeout('player.hideControls();', 3000);
        });
        
    });
    $('video').on("ended",function($){
        player.exitFullScreen();
        player.showControls();
    });
    
    $('.control a').click(function(){
        var $url = $( this ).attr( 'data-bind' );
        $('#video-movie').attr( "src", $url );
        $('#video-movie source').attr( "src", $url );
        console.log($url);
        return false;
    });
});