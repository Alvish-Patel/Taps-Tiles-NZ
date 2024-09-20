<?php 
function marblex_display_loader()
{
    $pqf_options = get_option('pqf_options'); 
    if(isset($pqf_options['loader_switch']))
    {    
        if($pqf_options['loader_switch'] == 'image')
        {
            if(!empty($pqf_options['background_loader']['url']))
            {
                ?>
                <div id="pt-loading">
                    <div id="pt-loading-center">
                      
                        <img src="<?php echo esc_url($pqf_options['background_loader']['url']) ?>" alt="<?php esc_attr_e('loading','marblex'); ?>">
                        
                    </div>
                </div>
            <?php }
        }      
        else if($pqf_options['loader_switch'] == 'text')
        {
            if(!empty($pqf_options['loader_text']))
            {
                $tag = $pqf_options['loader_tag'];
            ?>
                <div id="pt-loading">
                    <div id="pt-loading-center">
                      
                        <<?php echo esc_html($tag); ?> class="pt-loader-text"><?php echo esc_html($pqf_options['loader_text']) ?></<?php echo esc_html($tag); ?>>
                        
                    </div>
                  </div>
            <?php }
        }
    }
    else
    {
        ?>
        <div id="pt-loading">
            <div id="pt-loading-center">
              
                <img src="<?php echo CONST_MARBLEX_URI.'/assets/img/loader.png' ?>" alt="<?php esc_attr_e('loading','marblex'); ?>">
                
            </div>
        </div>
    <?php 
    }
}

function marblex_display_logo()
{
    $pqf_options = get_option('pqf_options');
    $logo = CONST_MARBLEX_URI.'/assets/img/logo.png';
    
    
    if(function_exists('get_field') && get_field('key_pjos')['set_sep_logo'] == 'yes' && !empty(get_field('key_pjos')['logo_image']['url']) )
    {
        $fld = get_field('key_pjos');
        
            $logo = $fld['logo_image']['url'];
            ?>
            <img class="img-fluid logo" src="<?php echo esc_url($logo,'marblex') ?>" alt="<?php  esc_attr_e( 'marblex', 'marblex' ); ?>"> 
        <?php 
        
    }
    else if(isset($pqf_options['logo_type']))
    {
        if($pqf_options['logo_type'] == 'image')
        {
            if(!empty($pqf_options['logo_url']['url']))
            {
                $logo = $pqf_options['logo_url']['url'];    
            }            
            

        ?>
        <img class="img-fluid logo" src="<?php echo esc_url($logo,'marblex') ?>" alt="<?php  esc_attr_e( 'marblex', 'marblex' ); ?>"> 
        <?php
        } 

        if($pqf_options['logo_type'] == 'text')
        {
            if(!empty($pqf_options['header_logo_text']))
            {
                $text = $pqf_options['header_logo_text'];
            }
            else
            {
                $text = 'marblex';
            }
            if(!empty($pqf_options['header_logo_tag']))
            {
                $tag = $pqf_options['header_logo_tag'];
            }
            else
            {
                $tag = 'h2';
            }

        ?>
            <<?php echo esc_html($tag); ?> class="pt-logo-text"><?php echo esc_html($text); ?></<?php echo esc_html($tag); ?>>
        <?php  
        }
        
    }
    else
    {
    ?>
        <img class="img-fluid logo" src="<?php echo esc_url($logo,'marblex') ?>" alt="<?php  esc_attr_e( 'marblex', 'marblex' ); ?>"> 
    <?php 
    }

}

function marblex_get_attachment_data($attachment_id = '')
{
     $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
}

function marblex_get_attachment_data_html($attachment_id = '' , $classes= array())
{
     $attachment = get_post( $attachment_id );
     $class = '';
     if(!empty($classes))
     {
       $class = implode(" " , $classes);
     }
        $data =  array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
        ?>
        <img src="<?php echo esc_url($data['src']) ?>" title="<?php echo esc_attr($data['title']) ?>" alt="<?php echo esc_attr($data['alt']); ?>" class="<?php echo esc_attr($class); ?>" >
        <?php 
}

?>