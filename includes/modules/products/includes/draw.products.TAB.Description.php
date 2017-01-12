<?php
	ai_cascadepath(); //log time
	global $AI;
?>
<!--
<style>
#title {width:90%;}
#url_name {width:200px;}
#description {width:98%;}
#features {width:98%;}
div.divlabel {
	font-weight:bold;
	color:#000;
	margin-top:10px;
}
</style>
-->

<div class="row">
	<div class="span12">

		<div class="te_edit products_edit">

		<form id="products_form" class="te" method="post" action="<?php echo h($postURL); ?>" onsubmit="return true;" enctype="multipart/form-data">

		<input type="hidden" id="products_first_save" name="first_save" value="0" />
		<input type="hidden" id="products_duplicate" name="duplicate" value="0" />
		<input type="hidden" id="products_review" name="review" value="0" />

		<?php if( $this->write_error_msg != '' ){ ?>
		<div id="product_save_error" class="error"><?php echo htmlspecialchars( $this->write_error_msg ); ?></div>
		<?php } ?>

		<br>
		<!--table border=0 width="100%">
		<tr><td width="50%" valign="top"-->
		<div class="row">
			<div class="span6">
				<h2 class="divlabel te <?php echo $this->get_field_type( 'title' ); ?> title" for="title">Product Title <?php $this->draw_tool_tip('prod_code'); ?></h2>
				<?php $this->draw_input_field( 'title', $this->db['title'], 'edit', 'title' ); ?>
			</div>
			<div class="span6">
		<!--/td><td valign="top"-->
			<!--
				<h2 class="divlabel te <?php echo $this->get_field_type( 'folderID' ); ?> folderID" for="folderID">Product Categories <?php $this->draw_tool_tip('prod_folder'); ?></h2>
				<?php //$this->draw_input_field_folders();
				?>
			-->
			</div>
		</div>
		<!--/td></tr>
		</table-->

		&nbsp;
		<h2 class="divlabel te <?php echo $this->get_field_type( 'url_name' ); ?> url_name" for="url_name">Product Address</h2>
		<p style="overflow:hidden;"><?php $this->draw_input_field( 'url_name', $this->db['url_name'], 'edit', 'url_name' ); ?></p>

		<h2 class="divlabel te <?php echo $this->get_field_type( 'description' ); ?> description" for="description">Product Description</h2>
		<div id="product_description_wysiwyg" class="product_edit_wysiwyg"><?php $this->draw_input_field( 'description', $this->db['description'], 'edit', 'description' ); ?></div>
		&nbsp;

			<h2 class="divlabel te <?php echo $this->get_field_type( 'features' ); ?> features" for="features">Product Features <small>Optional</small></h2>
			<div id="product_features_wysiwyg" class="product_edit_wysiwyg"><?php $this->draw_input_field( 'features', $this->db['features'], 'edit', 'features' ); ?></div>

			<h2 class="divlabel te <?php echo $this->get_field_type( 'ingredients' ); ?> ingredients" for="ingredients">Product Ingredients <small>Optional</small></h2>
			<div id="product_ingredients_wysiwyg" class="product_edit_wysiwyg"><?php $this->draw_input_field( 'ingredients', $this->db['ingredients'], 'edit', 'ingredients' ); ?></div>

			<h2 class="divlabel te <?php echo $this->get_field_type( 'benefits' ); ?> benefits" for="benefits">Benefits <small>Optional</small></h2>
			<div id="product_benefits_wysiwyg" class="product_edit_wysiwyg"><?php $this->draw_input_field( 'benefits', $this->db['benefits'], 'edit', 'benefits' ); ?></div>
		&nbsp;

		<h2 class="divlabel te <?php echo $this->get_field_type( 'brand' ); ?> brand" for="brand">Product Brand <small>Optional</small></h2>
		<p><?php $this->draw_input_field( 'brand', $this->db['brand'], 'edit', 'brand' ); ?></p>

			<h2 class="divlabel te <?php echo $this->get_field_type( 'alternate_url' ); ?> alternate_url" for="alternate_url">Detail Page Url<small>Optional</small></h2>
			<p style="overflow:hidden;"><?php $this->draw_input_field( 'alternate_url', $this->db['alternate_url'], 'edit', 'alternate_url' ); ?></p>
		&nbsp;

		<h2 class="divlabel te <?php echo $this->get_field_type( 'description' ); ?> description" for="description">Images</h2>
		<div><!--Note: First image uploaded will be default. Default image appears as icon.--> <?php
			// Jon 2007.11.13: Need to specify a te_key even in insert/copy,
			// otherwise uploads won't be linked to any listing (will predict based on table_data)
			// Jon 2007.11.14: Correction - already taken care of
			/*
			if ($this->te_mode == 'insert' || $this->te_mode == 'copy')
			{
			$row = db_lookup_assoc("SHOW TABLE STATUS LIKE '" . db_in($this->_dbTableName) . "';");
			$foreignID = (int)$row['Auto_increment'];
			}
			else
			{
			$foreignID = $this->te_key;
			}*/
			$upload = new C_upload($this->_dbTableName, $this->te_key); //$foreignID);
			$upload->show_url_input=1;
			$upload->run($this->te_mode);
		?></div>

		</form>

		</div>
	</div>
	<div class="span4"><?php $this->draw_product_entry_menu(); ?></div>
</div>
