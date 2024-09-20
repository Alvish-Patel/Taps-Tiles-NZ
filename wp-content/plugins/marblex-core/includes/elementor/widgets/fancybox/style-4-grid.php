<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
}
$settings = $this->get_settings();
$settings = $this->get_settings_for_display();


if ($settings['fancy_style'] === "4" && $settings['fancy_inner_style'] == 'grid') 
{

    $title_html = $settings['fancy_title_text'];
    $title = sprintf('<%1$s class="pt-fancy-box-title">%2$s</%1$s>', $settings['title_tag'],$title_html);


    if (!empty($settings['fancy_description_text'])) 
    {
        $desc_html = $this->parse_text_editor($settings['fancy_description_text']);
    } 
    ?>
    <div class="pt-fancy-box pt-style-4 <?php echo $settings['content_align']; ?>">
     <div class="pt-fancy-box-info">
        <?php echo $title; ?>
        <p class="pt-fancy-box-description"><?php echo $desc_html; ?>  </p>
        <div class="pt-fancy-box-content">
           <div class="pt-fancy-box-icon">
               <i class="<?php echo esc_attr($settings['fancy_icon']['value']) ?>"></i>
           </div>
           <?php
           if ($settings['show_button'] == 'yes') 
           {
            require MARBLEX_CORE_DIR . '/includes/elementor/widgets/button/style.php';
        }
        ?>
    </div>
</div>
</div>

<?php }  ?>



