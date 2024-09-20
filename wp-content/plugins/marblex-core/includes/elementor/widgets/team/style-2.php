<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
}
$html = '';
$settings = $this->get_settings();

if ($settings['team_style'] === '2')
{
    ?>
    <div class="pt-team pt-team-style-1 <?php echo esc_html($settings['content_align']); ?>">
        <?php
        ?>
        <div class="pt-team-style-2 <?php echo esc_html($settings['content_align']); ?>">
            <div class="pt-team-box">
                <div class="pt-team-img">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="team-image">
                    <div class="pt-team-social">
                        <ul>
                         <?php
                         $cnt = array();
                         $icon_cnt = array_push($cnt,array_keys($settings));
                         foreach($cnt as $ind => $v)
                         {
                            $count = count(preg_grep("/^icon_list/i", $v));
                        }
                        $icons_array = array();
                        for($i = 1; $i <= $count; $i++ )
                        {
                            array_push($icons_array,array($settings['icon_list'.$i] => $settings['icon_url'.$i]));
                        }

                        foreach($icons_array as $key => $icon)
                        {
                            foreach($icon as $key2 => $link)
                            {
                                $social = str_replace('soc-','fab fa-',$key2 );
                                if(!empty($link['url']))
                                {
                                    $link_key = 'link_';
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
                 
                    <?php echo esc_html($settings['title_text']); ?>
                    
                </h5>
                <span class="pt-team-designation"><?php echo esc_html($settings['sub_title_text']); ?></span>
            </div>
        </div>
    </div>

</div>
<?php } ?>



