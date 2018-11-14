<?php
	function dg_remove_parent_menu(){
		remove_action('genesis_after_header','genesis_do_nav');
	}

	add_action('init','dg_remove_parent_menu');
?>