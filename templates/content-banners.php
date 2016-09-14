<?php the_content(); ?>
<style type="text/css">
.button-box{margin-bottom: 40px; border: 1px solid #0082c8; background-color: #dfeff8; padding: 1em;}
.button-box textarea{font-size: 12px; color: #333; background: #eee; font-family: Courier, monospace, sans-serif; width: 100%; height: 40px}
</style>
<script type="text/javascript">
function SelectAll(id){
    document.getElementById(id).focus();
    document.getElementById(id).select();
}
</script>
<?php
// http://media.pickupmydonation.com/banners/donate_now_180x150_01.png
$buttons = array( 'donate_now_180x150_01.png', 'donate_now_234x60_01.png', 'donate_now_468x60_01.png', 'donate_now_468x90_01.png', 'pickup_now_180x150_01.png', 'pickup_now_234x60_01.png', 'pickup_now_468x60_01.png', 'pickup_now_468x90_01.png' );
$x = 0;
foreach( $buttons as $button ){
	$image_url = 'https://s3.amazonaws.com/media.pickupmydonation.com/banners/'.$button;
	$image = getimagesize( $image_url );
	$html = '<a href="https://www.pickupmydonation.com" title="Schedule your donation pickup now!"><img src="'.$image_url.'" '.$image[3].' /></a>';
	echo '<div class="button-box">'.$html.'<h5>Dimensions: '.$image[0].'x'.$image[1].'</h5><textarea id="txt-'.$x.'" onclick="SelectAll(\'txt-'.$x.'\')">'.esc_textarea( $html ).'</textarea></div>';
	$x++;
}
?>