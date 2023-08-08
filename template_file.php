<?php

/* Template Name: Tracking Page */

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-page' );

get_header();

?>
<style>
div#ajax_result {
    width: 400px;
    margin: 0 auto;
    font-size: 14px;
    background: #fff;
    padding: 15px;
    border: 1px solid;
    text-align: left;
}
.container 
{
  width:100%;
}

div#ajax_result th, div#ajax_result td {
    padding: 7px!important;
    border: none;
}
    input.input-text {
    width: 100%;
    height: auto;
    padding: 6px!important;
    font-size: 14px!important;
    background: #fff!important;
}
.alert-danger {
    color: red;
}
.form-row {
    width: 280px;
    margin: 16px auto;
}

.btn {
    padding: 15px 20px;
    border-radius: 2px;
    background: #de0000;
    font-size: 16px;
    color: #fff;
    text-align: center;
    width: 100%;
}

.col-md-12 {
    background: #f1f1f1;
    padding: 15px;
    border: 1px solid #d6d6d6;
    margin: 40px 0;
}

/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display:none;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<div class="loading">Loading&#8230;</div>
<div class="<?php echo esc_attr( $container_class ); ?> single-page-container">
	<div class="row">
		<?php do_action( 'neve_do_sidebar', 'single-page', 'left' ); ?>
		<div class="nv-single-page-wrap col">
			<?php
			/**
			 * Executes actions before the page header.
			 *
			 * @since 2.4.0
			 */
		//	do_action( 'neve_before_page_header' );

			/**
			 * Executes the rendering function for the page header.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_page_header', 'single-page' );

			/**
			 * Executes actions before the page content.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_before_content', 'single-page' );
            ?>
            <!--HTML GOES HERE-->
            
            <div class="col-md-12">
                    <div class="form-row" id="ajax_result">
                        
                    </div>
                    <div class="form-row">
                        <label class="evf-field-label">Reference Number</label><br>
                        <input id="track_no" type="text" name="reference_no" placeholder="Enter reference no." class="input-text">
                    </div>
                    <div class="form-row">
                        <button id="trackbtn" class="btn">Track </button>
                    </div>
                
            </div>
            
            <?php
		

			/**
			 * Executes actions after the page content.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_after_content', 'single-page' );
			?>
		</div>
		<?php do_action( 'neve_do_sidebar', 'single-page', 'right' ); ?>
	</div>
</div>
<?php get_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function(e) {

jQuery('#ajax_result').hide(); 
jQuery('#trackbtn').click(function(e) {
        e.preventDefault()
        var text = jQuery('#track_no').val();
        if(text=='')
        {
            alert('Please Enter Some Value')
            return false
        }
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        jQuery.ajax({
                type: "POST",
                url: ajaxurl,
                dataType:"html",
                data: { 
                    action: 'data_custom_ajax',
                    text: text,
                },
                cache: false,
                beforeSend: function(){
                 $(".loading").show();
               },
               complete: function(){
                 $(".loading").hide();
               },
                success: function(data){                    
                    if(data ==''){
                        jQuery('#ajax_result').hide();                        
                    }
                    else{
                        jQuery('#ajax_result').css('display','block');
                        jQuery('#ajax_result').html(data);                            
                    }
                }
        });
    });
});
</script>
