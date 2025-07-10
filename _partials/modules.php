<?php
$contentField = $contentField ?? '';
?>



<?php
	if(!$contentField) {
		$contentField = 'modules';
	}
?>

<?php
	if (have_rows($contentField)):
		$count = 0;

		while (have_rows($contentField)) : the_row();

			echo '<section class="o-module--' . get_row_layout() . '">';
			include(locate_template('_modules/' . get_row_layout() . '.php'));
			echo '</section>';

			$count++;

		endwhile;

	endif;
?>