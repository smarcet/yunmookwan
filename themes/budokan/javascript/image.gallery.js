$(document).ready(function() {
    var $photos = $('.photo-grid');
    if($photos.length>0){

        var $last_img = $('img:last-child',$photos);
        $last_img.attr("data-islast","1");
        $("img",$photos)
            .each( function( index, element ){
               var $cur_img = $(this);
               $cur_img.load(function() {
                    var $img = $(this);
                    if($img.attr("data-islast")=='1'){
                        var position = $img.position();
                        $photos.css({height:position.top+$img.height()});
                    }
                })
                   .error(function() {})
                    .attr("src", $cur_img.attr("data-url"))
            });

    }
});