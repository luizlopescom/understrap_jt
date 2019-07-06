<?php
/**
 * Content empty partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<main class="site-main" id="main">

	<?php if ( ! is_front_page() ) { //SEO ?>
		<h1 class="visuallyhidden"><?php echo get_the_title(); ?></h1>
	<?php } ?>

	<?php

the_content();

?>
</main>
<?php