<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

$html = '';
$icon = '';



$tabs = $this->get_settings_for_display( 'tabs' );
$settings = $this->get_settings();
$id_int = rand(10,100);    
$align = $settings['align'];
$this->add_render_attribute( 'pt_class', 'class', 'pt-accordion-block') ;

$this->add_render_attribute( 'pt_class', 'class', $align) ;

if($settings['has_icon'] == 'yes')
{

  $icon .= sprintf('<i aria-hidden="true" class="%1$s active"></i>',esc_attr($settings['active_icon']['value'],'medicate'));
  $icon .= sprintf('<i aria-hidden="true" class="%1$s inactive"></i>',esc_attr($settings['inactive_icon']['value'],'medicate'));
}

?>
<?php
if ($settings['accordion_style'] === "1") {
  ?>    
  <div <?php echo $this->get_render_attribute_string( 'pt_class' ) ?> >
    <?php 
    $i=1; 
    foreach ( $tabs as $index => $item )
    {       
      if($i == 1)
      { 
        $show = "show"; 
        $style="style=display:block"; 
        $adactive="pt-active";   
        
        
      }
      else
      { 
        $style=""; 
        $show = ""; 
        $adactive="";
      }
      ?>
      <div class="pt-accordion-block ">
      <div class="pt-accordion-box <?php echo esc_attr( $adactive ) . '  '.$i;  ?>">
        <div class="pt-ad-title">

          <<?php echo $settings['title_tag']; ?> class="ad-title-text">         
          <?php echo esc_html__($item['tab_title'],'medicate'); ?>  

          <?php echo $icon; ?>   

          </<?php echo $settings['title_tag']; ?>>

        </div>

        <div class="pt-accordion-details">

         <p class="pt-detail-text"> <?php echo $this->parse_text_editor($item['tab_content']); ?> </p>

       </div>
     </div>
   </div>
     <?php $i++; } ?>
   </div>
 <?php } ?>

