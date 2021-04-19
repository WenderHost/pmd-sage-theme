<?php
/*
Template Name: Subpage Tabs w/ Partners CTA
*/
?>
<style>
  .video { position: relative; padding-bottom: 56.25%; /* 16:9 */ height: 0; }
  .video img { position: absolute; display: block; top: 0; left: 0; width: 100%; height: 100%; z-index: 20; cursor: pointer; }
  .video:after { content: ""; position: absolute; display: block;
      background: url(play-button.png) no-repeat 0 0;
      top: 45%; left: 45%; width: 46px; height: 36px; z-index: 30; cursor: pointer; }
  .video iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

  /* image poster clicked, player class added using js */
  .video.player img { display: none; }
  .video.player:after { display: none; }
</style>
<script>
(function($){
  $(function() {
      var videos  = $(".video");

          videos.on("click", function(){
              var elm = $(this),
                  conts   = elm.contents(),
                  le      = conts.length,
                  ifr     = null;

              for(var i = 0; i<le; i++){
                if(conts[i].nodeType == 8) ifr = conts[i].textContent;
              }

              elm.addClass("player").html(ifr);
              elm.off("click");
          });
  });
})(jQuery);
</script>
<?php while (have_posts()) : the_post(); ?>
  <div class="container">
      <?php get_template_part('templates/page', 'header'); ?>
      <?php get_template_part('templates/content', 'subpage-tabs'); ?>
  </div>
  <?php get_template_part('templates/content', 'contact-form'); ?>
  <?php get_template_part('templates/content', 'partner-cta'); ?>
<?php endwhile; ?>