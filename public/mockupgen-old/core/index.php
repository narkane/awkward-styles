<?php
	
	global $lumise;
	
	require_once('includes/main.php');

	// $product = $lumise->db->rawQuery("SELECT * FROM `{$lumise->db->prefix}products` WHERE id=".$_GET['product']);
	$product = $lumise->db->rawQuery("select mp.id as product_id, mp.code as product_code, mp.label as product_name, mm.preview as image_url from mshop_product as mp 
	left join mshop_product_list as mpl on mpl.parentid = mp.id 
	left join mshop_media as mm on mm.id = mpl.refid
	where mpl.pos = 0 and mpl.domain in ('media') and mp.id = ".$_GET['product']);
//   var_dump($product); exit;
	if($lumise->is_app()) :
	
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $lumise->lang($lumise->cfg->settings['title']); ?></title>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
		<link rel="stylesheet" href="<?php echo $lumise->apply_filters('editor/app.css', $lumise->cfg->assets_url.'assets/css/app.css?version='.LUMISE); ?>">
		<link rel="stylesheet" media="only screen and (max-width: 1024px)" href="<?php echo $lumise->apply_filters('editor/responsive.css', $lumise->cfg->assets_url.'assets/css/responsive.css?version='.LUMISE); ?>">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
<?php 
	if (is_file($lumise->cfg->upload_path.'user_data'.DS.'custom.css')) { 
?> <link rel="stylesheet" href="<?php echo $lumise->cfg->upload_url; ?>user_data/custom.css?version=<?php echo $lumise->cfg->settings['last_update']; ?>"><?php 
} 

$lumise->do_action('editor-header'); 

?></head>
<body>
	<div class="wrapper">
		<div id="LumiseDesign" data-site="https://lumise.com" data-processing="true" data-msg="<?php echo $lumise->lang('Initializing'); ?>..">
			<!-- <div id="lumise-navigations" data-navigation="">
				<?php //$lumise->display('nav'); ?>
			</div> -->
			<div id="lumise-workspace">

				<?php $lumise->display('left'); ?>
				<div id="lumise-top-tools" data-navigation="" data-view="standard">
					<?php $lumise->display('tool'); ?>
				</div>

				<div id="lumise-main">
				<div class="container">		
					<div class="component">
						<div class="ab_comp"> 
							<img src="http://ec2-18-234-126-164.compute-1.amazonaws.com/<?php echo $product[0]['image_url']; ?>">
						</div>
								<!-- This image must be on the same domain as the demo or it will not work on a local file system -->
								<!-- http://en.wikipedia.org/wiki/Cross-origin_resource_sharing -->
								<div class="resize-container"><span class="resize-handle resize-handle-nw"></span><span class="resize-handle resize-handle-ne"></span><img class="resize-image" src="img/art.png" alt="image for resizing"><span class="resize-handle resize-handle-sw"></span><span class="resize-handle resize-handle-se"></span></div>
						<!-- /container -->
					</div>
					<script src="js/jquery-2.1.1.min.js"></script>
					<script src="js/component.js"></script>
				</div>
				<!-- <div id="nav-bottom-left">
					<div data-nav="colors" id="lumise-count-colors" title="<?php //echo $lumise->lang('Count colors'); ?>">
						<i>0+</i>
					</div>
				</div>
				<div id="lumise-zoom-wrp">
					<i class="lumisex-android-remove" data-zoom="out"></i>
					<span><?php //echo $lumise->lang('Scroll to zoom'); ?></span>
					<inp data-range="helper" data-value="100%">
						<input type="range" id="lumise-zoom" data-value="100%" min="100" max="250" value="100" />
					</inp>
					<i class="lumisex-android-add" data-zoom="in"></i>
				</div>
				<div id="lumise-zoom-thumbn">
					<span></span>
				</div>
				<div id="lumise-stage-nav">
					<ul></ul>
				</div>
				<div id="lumise-notices"></div> -->
			</div>
		</div>
	</div>
	<script>
		function LumiseDesign (lumise) {
			
			lumise.data = {
				version: "<?php echo LUMISE; ?>",
				theme_color: "<?php echo explode('@', explode(':', $lumise->cfg->settings['colors'])[0])[0]; ?>",
				stages : {},
				currency : "<?php echo $lumise->cfg->settings['currency']; ?>",
				switch_lang : <?php echo $lumise->cfg->settings['allow_select_lang']; ?>,
				thousand_separator : "<?php echo isset($lumise->cfg->settings['thousand_separator'])? $lumise->cfg->settings['thousand_separator'] : ','; ?>",
				decimal_separator : "<?php echo isset($lumise->cfg->settings['decimal_separator'])? $lumise->cfg->settings['decimal_separator'] : '.'; ?>",
				number_decimals : "<?php echo isset($lumise->cfg->settings['number_decimals'])? $lumise->cfg->settings['number_decimals'] : 2; ?>",
				currency_position : "<?php echo $lumise->cfg->settings['currency_position']; ?>",
				min_upload: <?php echo isset($lumise->cfg->settings['min_upload'])? (int)$lumise->cfg->settings['min_upload'] : 0; ?>,
				max_upload: <?php echo isset($lumise->cfg->settings['max_upload'])? (int)$lumise->cfg->settings['max_upload'] : 0; ?>,
				min_dimensions: <?php echo isset($lumise->cfg->settings['min_dimensions']) ? json_encode(explode('x', $lumise->cfg->settings['min_dimensions'])) : ''; ?>,
				max_dimensions: <?php echo isset($lumise->cfg->settings['max_dimensions']) ? json_encode(explode('x', $lumise->cfg->settings['max_dimensions'])) : ''; ?>,
				min_ppi: '<?php echo isset($lumise->cfg->settings['min_ppi']) ? $lumise->cfg->settings['min_ppi'] : ''; ?>',
				max_ppi: '<?php echo isset($lumise->cfg->settings['max_ppi']) ? $lumise->cfg->settings['max_ppi'] : ''; ?>',
                printings : [],
				url : "<?php echo $lumise->cfg->url; ?>",
				tool_url : "<?php echo $lumise->cfg->tool_url; ?>",
				upload_url : "<?php echo $lumise->cfg->upload_url; ?>",
				checkout_url : "<?php echo $lumise->cfg->checkout_url; ?>",
				ajax : "<?php echo $lumise->cfg->ajax_url; ?>",
				assets : "<?php echo $lumise->cfg->assets_url; ?>",
				jquery : "<?php echo $lumise->cfg->load_jquery; ?>",
				nonce : "<?php echo lumise_secure::create_nonce('LUMISE-SECURITY'); ?>",
				access_core : "<?php echo is_array($lumise->cfg->access_core) ? implode(',', $lumise->cfg->access_core) : $lumise->cfg->access_core; ?>",
				editing: localStorage.getItem('LUMISE-EDITING'),
				design : "<?php echo $lumise->esc('design_print'); ?>",
				product : "<?php echo $lumise->esc('product'); ?>",
				default_fonts: <?php echo !empty($lumise->cfg->default_fonts) ? stripslashes($lumise->cfg->default_fonts) : '{}'; ?>,
				fonts: <?php echo json_encode($lumise->get_fonts()); ?>,
				js_lang : <?php echo json_encode($lumise->cfg->js_lang); ?>,
				rtl : '<?php echo $lumise->cfg->settings['rtl']; ?>',
				prefix_file : '<?php echo urlencode($lumise->cfg->settings['prefix_file']); ?>',
				text_direction : '<?php echo $lumise->cfg->settings['text_direction']; ?>',
				conditions : '<?php echo (isset($lumise->cfg->settings['conditions']) && !empty($lumise->cfg->settings['conditions'])) ? $lumise->lib->enjson($lumise->cfg->settings['conditions']) : ''; ?>',
				size_default : <?php echo json_encode($lumise->cfg->size_default); ?>,
				print_types : <?php 
					echo json_encode($lumise->lib->get_print_types());
					echo $lumise->lib->product_cfg();
				?>
			};
			
			try {
				lumise.attributes_cfg = <?php echo json_encode($lumise->cfg->product_attributes); ?>;
			} catch (ex) {
				lumise.attributes_cfg = {};
				alert("<?php echo $lumise->lang('Error: configure the attributes of product'); ?>\n\n"+ex.message);
			}
			
			var real_uri = window.location.href.split('?'),
				reg_uri = lumise.data.tool_url.split('?');
			
			if (real_uri[0] != reg_uri[0]) {
				if (real_uri[1] !== undefined)
					window.location = reg_uri[0]+'?'+real_uri[1];
				else window.location = reg_uri[0];
				return false;
			} else {
				<?php $lumise->do_action('js_init'); ?>
				return true;
			}
			
		};
	</script>
	<?php if ($lumise->cfg->load_jquery){ ?>
	<script src="<?php echo $lumise->apply_filters('editor/jquery.min.js', $lumise->cfg->assets_url.'assets/js/jquery.min.js?version='.LUMISE); ?>"></script>
	<?php } ?>
	<script src="<?php echo $lumise->apply_filters('editor/vendors.js', $lumise->cfg->assets_url.'assets/js/vendors.js?version='.LUMISE); ?>""></script>
	<script src="<?php echo $lumise->apply_filters('editor/app.js', $lumise->cfg->assets_url.'assets/js/app.js?version='.LUMISE); ?>"></script>
	<?php 
		
		$lumise->do_action('editor-footer');
		
		if (!empty($lumise->cfg->settings['custom_js'])) {
			$custom_js = str_replace(
				array('<script', '</script>'),
				array('&lt;script', '&lt;/script&gt;'),
				$lumise->cfg->settings['custom_js']
			);
			echo '<script type="text/javascript">'.stripslashes($custom_js).'</script>';
		}
		
	?>
</body>
</html>
<?php endif;
