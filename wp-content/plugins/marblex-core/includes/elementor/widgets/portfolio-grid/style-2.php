<?php
namespace Elementor;
if (!defined('ABSPATH')) {
  exit;
}

$settings = $this->get_settings();

$title_html = '';
$desc_html = '';


if($settings['portfolio_style'] == '2' )
{
  $tabs = $this->get_settings_for_display( 'list_items' );
  ?>
  <div class="pt-portfoliobox-2">
    <div class="pt-protfolio-tabs">
      <?php
      foreach($tabs as $key=>$item)
      {
        if($key == 2 )    {
            // $active = 'active';
            $active = 'active';
        }
        else
        {
            $active = '';
        }
        if (!empty($item['portfolio_location'])) 
        {
          $desc_html = $this->parse_text_editor($item['portfolio_location']);
        }
        
        if ( ! empty( $item['btn_link']['url'] ) ) 
        {
          $this->add_render_attribute( 'btn_attr'.$key, 'href', $item['btn_link']['url'] );

          if ( $item['btn_link']['is_external'] ) {
            $this->add_render_attribute( 'btn_attr'.$key, 'target', '_blank' );
          }

          if ( ! empty( $item['btn_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'btn_attr'.$key, 'rel', 'nofollow' );
          }
        }
      
        ?>
        
        
        <div class="protfolio-tabs-item">
          <a <?php echo $this->get_render_attribute_string('btn_attr'.$key); ?> class="protfolio-tabs-link <?php echo esc_attr($active); ?>" >
            <span class="portfolio-number"> <?php echo esc_html($item['number_text']); ?> </span>
            <?php 
            $title = sprintf('<%2$s class="portfolio-title">%1$s</%2$s>',$item['title_text'],$item['title_tag']);
            echo $title; ?>
            <p class="portfolio-location"><?php echo $desc_html; ?></p>
          </a>
          <?php 
          if(!empty($item['image']['url']))
          {
            ?>
            <img src="<?php echo esc_url($item['image']['url']); ?>" alt="protfolio-tabs-img" class="protfolio-tabs-img">
            <?php 
          }
          ?>
        </div>
        
        <?php
      }
      ?>
    </div>
  </div>

  <?php
}
?>





