<section class="donate">

	<h1 class="donate__hed"><?php the_field('donate_header', 'options'); ?></h1>
	<p class="donate__dek"><?php the_field('donate_text', 'options'); ?></p>

	<form id="donate_form" class="donate__form">
		<?php if( have_rows('donate_amounts', 'options') ): while ( have_rows('donate_amounts', 'options') ) : the_row();
			if (get_sub_field('default_donation')) {
				$default = get_sub_field('dollar_amount');
			}
		?>
			<input type="radio" id="donate_<?php the_sub_field('dollar_amount'); ?>" class="donate__radio" name="donate__amount"<?php echo (get_sub_field('default_donation')) ? ' checked="checked"' : ''; ?> value="<?php the_sub_field('dollar_amount'); ?>">
			<label for="donate_<?php the_sub_field('dollar_amount'); ?>" class="donate__label"><sup class="donate__sup">&#36;</sup><?php the_sub_field('dollar_amount'); ?></label>
		<?php endwhile; endif;

		// default default
		if (!isset($default)) {
			$default = '10';
		} ?>

		<input type="radio" id="donate_other" class="donate__radio" name="donate__amount" value="other">
		<label for="donate_other" class="donate__label">Other</label>

		<?php //Donate link
			$donatelink = (get_field('donate_link', 'options'));
			$donatelink .= (false === strpos(get_field('donate_link', 'options'), '?')) ? '?amount=' : '&amount=';
			$donatelink .= $default;
			$donatelink .= '&refcode=module-' . $post->post_name; ?>

		<a href="<?php echo $donatelink; ?>" class="donate__submit">Donate</a>
	</form>
	
</section>
