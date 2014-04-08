jQuery(document).ready(function($){
    $('audio,video').mediaelementplayer({
        loop: true,
        shuffle: false,
        playlist: true,
        audioHeight: 10,
        playlistposition: 'bottom',
        features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'loop', 'current', 'progress', 'duration', 'volume', 'fullscreen']
    });
    /*
     $("#selector a").click(function(){
        var $videoNumber = $( "#selector li a" ).index( this );
        console.log($videoNumber);
        
        $('ul.mejs li.current').removeClass('current');
        $('ul.mejs li').eq($videoNumber).addClass('current played');
        ($('ul.mejs li').eq($videoNumber));
    });
    */
});
