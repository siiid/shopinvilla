// JavaScript Document
(function ($){
	var $tiles = $('#tiles'),
        $handler = $('li', $tiles),
        $main = $('#main'),
        $window = $(window),
        $document = $(document),
        options = {
            autoResize: true,
            container: $main,
            offset: 25,
            itemWidth: 200 
          };
    function applyLayout()
	{
      $tiles.imagesLoaded(function() {
      if ($handler.wookmarkInstance) {
            $handler.wookmarkInstance.clear();
          }
          $handler = $('li', $tiles);
          $handler.wookmark(options);
        });
     }
	 applyLayout();
	 
	 $window.load(function(){
		 $(".bug_removed").fadeOut(1000, function(){
    	 $("#tiles").show('fast');
         });
	 });
})(jQuery);



jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.for_scr').fadeIn(duration);
			
			
			$('.for_scr_l').fadeIn('fast');
			
			
			
			
        } else {
            jQuery('.for_scr').fadeOut(duration);
        }
    });
    
    jQuery('.for_scr').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});