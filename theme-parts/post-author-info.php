<?php
$bio = get_the_author_meta( 'description' );
if( !empty($bio) ) :
?>
	<div class="pbmit-author-box">
		<?php if(get_avatar(get_the_author_meta('ID')) !== FALSE) { ?>
			<div class="pbmit-author-image">
				<?php echo pbmit_esc_kses( get_avatar(get_the_author_meta('ID')) ); ?>
			</div>
		<?php } ?>
		<div class="pbmit-author-content">
			<span class="pbmit-author-name">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_attr__('Posted by %1$s','xcare'), get_the_author() ); ?>" rel="author"><?php echo get_the_author(); ?></a>
			</span>
			<p class="pbmit-text pbmit-author-bio"><?php the_author_meta( 'description' ); ?></p>
			<?php pbmit_author_social_links(); ?>
		</div>
	</div>
<?php endif; ?>