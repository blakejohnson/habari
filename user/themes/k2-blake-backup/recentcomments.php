<!-- To customize this template, copy it to your currently active theme directory and edit it -->
<div id="latest-comments" class="sb-comments">
	<h2><?php echo $recentcomments_title; ?></h2>
	<a class="feedlink" title="Atom Feed for Comments" href="<?php URL::out( 'atom_feed_comments' ); ?>"><span>Atom</span></a>
	<ul>
	<?php foreach ( $recentcomments_links as $link ) : ?>
		<?php echo $link; ?>
	<?php endforeach; ?>
	</ul>
</div>
