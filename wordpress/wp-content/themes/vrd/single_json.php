<?php

	$query = new WP_Query();

	echo json_encode($query->get_posts());

?>
