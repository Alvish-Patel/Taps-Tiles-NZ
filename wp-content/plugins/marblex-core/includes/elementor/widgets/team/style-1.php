<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
}
$html = '';
$settings = $this->get_settings();
$tabs = $this->get_settings_for_display( 'tabs' );


if ($settings['team_style'] === '1')
{
    $slider = new Slider_Controls();
    $slider->add_render_attribute($this , $settings);
    ?>
    <div class="pt-team-box-slider pt-team-style-1 ">
       <div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>
        <?php
        foreach ( $tabs as $index => $item )
        {            
            ?>
            <div class="item">
             <div class="pt-team-style-1  <?php echo esc_html($settings['content_align']); ?>">
                <div class="pt-team-box">
                    <div class="pt-team-img">
                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="team-image">
                        <div class="pt-team-social">
                          <ul>
                             <?php
                             $cnt = array();
                             $icon_cnt = array_push($cnt,array_keys($item));
                             foreach($cnt as $ind => $v)
                             {
                                $count = count(preg_grep("/^icon_list/i", $v));
                            }
                            $icons_array = array();
                            for($i = 1; $i <= $count; $i++ )
                            {
                                array_push($icons_array,array($item['icon_list'.$i] => $item['icon_url'.$i]));
                            }

                            foreach($icons_array as $key => $icon)
                            {
                                foreach($icon as $key2 => $link)
                                {
                                    $social = str_replace('soc-','fab fa-',$key2 );
                                    if(!empty($link['url']))
                                    {
                                        $link_key = 'link_'.$index;
                                        $this->add_render_attribute( $link_key, 'href', $link );
                                        if ( $link['is_external'] ) {
                                            $this->add_render_attribute( $link_key, 'target', '_blank' );
                                        }
                                        if ( $link['nofollow'] ) {
                                            $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                        }
                                        ?>
                                        <li>
                                            <a <?php echo $this->get_render_attribute_string( $link_key ); ?>>
                                                <i class="<?php echo $social;  ?>"></i>
                                            </a>                                                
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul> 
                    </div>
                </div>
                <div class="pt-team-info">
                    <h5 class="pt-member-name">

                        <?php echo esc_html($item['title_text']); ?>

                    </h5>
                    <span class="pt-team-designation"><?php echo esc_html($item['sub_title_text']); ?></span>
                </div>
            </div>
        </div>

    </div>
<?php } ?>
</div>
</div>
<?php } ?>







