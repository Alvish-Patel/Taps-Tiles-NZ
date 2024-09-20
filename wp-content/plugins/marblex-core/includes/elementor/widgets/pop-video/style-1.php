<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
    	
	$settings = $this->get_settings();	
	$video_url = '';
	$imge_url	 = '';
	
	$icon = '';
	if($settings['video_type'] == 'hosted')
	{
		$video_url = $settings['self_url']['url'];
	}
	if($settings['video_type'] == 'video_link')
	{
		$video_url = $settings['link_url'];
	}
	 if($settings['image_style'] == 'image')
    {
        $icon = '<img class="hover-img" src="'.esc_url($settings['image_icon']['url']).'" alt="Pop up video">';
    }
    if($settings['image_style'] == 'icon')
    {
        $icon = sprintf('<i aria-hidden="true" class="%1$s"></i>',esc_attr($settings['selected_icon']['value'],'motoring-core'));
    }

?>
<?php
if($settings['pv_style'] == '1' || $settings['pv_style'] == '2')
 { ?>
<div class="pt-popup-video-block pt-popup-style-<?php echo esc_attr($settings['pv_style']); ?> <?php echo esc_attr($settings['text_align']); ?>">
	
    <div class="pt-video-icon" >
        <a href="<?php echo esc_url( $video_url ); ?>" class="pt-video <?php echo $settings['colour_elements']; ?> popup-youtube">
        	<?php echo $icon; ?>
        </a>	            
    </div>
</div>
 <?php } ?>

 