(function( $ ) {

    'use strict';



    jQuery(document).ready(function(){

        Pcfq_verify_init();

        Pcfq_notice_init();

    });



    function Pcfq_verify_init(){

        var wait_load = false;

        var security, purchase_item, user_email, content, js_activation;

        var btn;

        jQuery(document).on('click', '.activate-license', function(e){

            e.preventDefault();

            if ( wait_load ) return;

            wait_load = true;

            security = jQuery(this).closest('.Pcfq-purchase').find('#security').val();    

            user_email = jQuery(this).closest('.Pcfq-purchase').find('input[name="user_email"]').val();    

            purchase_item = jQuery(this).closest('.Pcfq-purchase').find('input[name="purchase_item"]').val(),    

            content = jQuery(this).closest('.Pcfq-purchase').find('input[name="content"]'),    

            js_activation = jQuery(this).closest('.Pcfq-purchase').find('input[name="js_activation"]'),    



            btn = jQuery(this); 

            jQuery(btn).closest('.Pcfq-purchase').find('.notice-validation').remove();

            jQuery.ajax({

                type : "post", 

                cache: false,

                async: true,

                url : ajaxurl,

                data : {

                    action: "theme_activation",        

                    security: security,

                    purchase_code: purchase_item,

                    email: user_email,

                },

                beforeSend: function() {

                    // setting a timeout

                    btn.addClass('loading');

                },

                error: function(jqXHR) {

                    console.log(jqXHR);
               

                    btn.addClass('loading');

                },

                success: function(response) {  

                    console.log(response);

                    var obj = JSON.parse(response);

                    if(!response){

                       // Pcfq_verify_alternative(security, purchase_item, user_email);

                    }else{

                        if(obj.code != 200){

                            var node_str = '<div class="notice-validation notice notice-error error" style="display: none;">';

                            node_str += obj.message;

                            node_str  += '</div>';

                            jQuery(btn).closest('.Pcfq-purchase').append(node_str);

                            jQuery('.notice-validation').fadeIn();

                        }

                        

                        if(obj.code == 200){

                            var node_str = '<div class="notice-validation notice notice-success success" style="display: none;">';

                            node_str += obj.message;

                            node_str  += '</div>';

                            jQuery(btn).closest('.Pcfq-purchase').append(node_str);

                            jQuery('.notice-validation').fadeIn();

                            setTimeout(function(){

                                window.location.reload();

                            }, 400);

                        }



                        btn.removeClass('loading');

                        wait_load = false;                           

                    }

 

                },

            }); 



                   

        });    

        jQuery(document).on('submit', '.deactivation_form', function(e){

            e.preventDefault();

            if ( wait_load ) return;

            wait_load = true; 



            security = jQuery(this).find('#security').val();

            btn = jQuery(this).find('.deactivate_theme-license'); 

            

            var dataParams = { 

                security: security,

                purchase_code: Pcfq_verify.purchaseCode,

                email: Pcfq_verify.email,

                deactivate_theme: 1,

                action: "deactivate_theme",     

                domain_url: Pcfq_verify.domainUrl,

                text_domain: Pcfq_verify.themeName,

                domain_id: Pcfq_verify.domain_id

            };

                

                jQuery.ajax({

                    type : "post", 

                    cache: false,

                    async: true,

                    url : Pcfq_verify.PcfqUrlDeactivate,

                    data : dataParams,

                    beforeSend: function() {

                        // setting a timeout

                        btn.addClass('loading');

                    },

                    error: function(jqXHR, textStatus, errorThrown) {

                        console.log(errorThrown);

                        btn.addClass('loading');

                    },

                    success: function(response) {

                        console.log(response);

                        btn.removeClass('loading');

                        wait_load = false;

                        e.currentTarget.submit();

                    },

                });

        });    

    }



    function Pcfq_notice_init(){

        jQuery(document).on('click', '.dismiss_notices', function(e){

            e.preventDefault();

            var notice = jQuery(this).closest('.notice').fadeOut();

            jQuery.ajax({

                type : "post", 

                cache: false,

                async: true,

                url : ajaxurl,

                data : {

                    action    : 'dismissed_notice',

                    nonce    : Pcfq_verify.ajax_nonce,

                },

                error: function(jqXHR, textStatus, errorThrown) {},

                success: function(response) {},

            });    

        });

    }



})( jQuery );

