<?php

$pqf_options = get_option('pqf_options');
$row = "row no-gutters";
$soc_align = "";
$con_align = "";
if(function_exists('get_field') && get_field('field_QnF1Ebs') != 'inherit')
{
 $key = get_field('key_pjroswas')['top_header_options'];
 if($key == 'social-right')
 {
  $row = "row flex-row-reverse";
  $soc_align = "text-right";
  $con_align = "";
}
if($key == 'social-left')
{
  $row = "row";
  $soc_align = "";
  $con_align = "text-right";
}
}
else if(isset($pqf_options['pt_top_header_layout']))
{
 if($pqf_options['pt_top_header_layout'] == 'social-right')
 {
  $row = "row flex-row-reverse";
  $soc_align = "text-right";
  $con_align = "";
}
if($pqf_options['pt_top_header_layout'] == 'social-left')
{
  $row = "row";
  $soc_align = "";
  $con_align = "text-right";
}

}
?>

<div class="<?php echo esc_attr($row); ?>">
 <div class="col-md-6 <?php echo esc_attr($soc_align); ?>">
  <div class="pt-top-right <?php echo esc_attr($soc_align); ?> ">
    <?php
     if(!empty($pqf_options['time']))
     {
      ?>
    <div class="pt-header-time ">
      <ul>
       <li>
        <i class="ti-timer"></i>
        <span><?php echo esc_html($pqf_options['time']); ?></span>
      </li>
    </ul>
  </div>
   <?php } ?>
  <div class="pt-header-social">
    <ul>
     <?php
     foreach ($pqf_options['social'] as $key => $value)
     {
       if(!empty($value))
       {
         ?>
         <li><a href="<?php echo esc_url($value); ?>"><i class="fab <?php echo esc_attr($key); ?>"></i></a></li>

         <?php 
       } 
     } 
     ?>
   </ul>
 </div>
</div>
</div>
<div class="col-md-6 <?php echo esc_attr($con_align); ?>  ">
  <div class="pt-header-contact <?php echo esc_attr($con_align); ?>">
    <ul>
     <?php
     if(!empty($pqf_options['phone']))
     {
      ?>
      <li>

        <a href="tel:<?php echo str_replace(str_split('(),-" '), '',$pqf_options['phone']); ?>"><i class="fas fa-phone"></i>
         <span><?php echo esc_html($pqf_options['phone']); ?></span>
       </a>
     </li>
   <?php } ?>
   <?php
   if(!empty($pqf_options['email']))
   {
    ?>
    <li>

      <a href="mailto:<?php echo esc_html($pqf_options['email']); ?>"><i class="fas fa-envelope"></i><span><?php echo esc_html($pqf_options['email']); ?></span></a>
    </li>
  <?php } ?>
</ul>
</div>

</div>
</div>

