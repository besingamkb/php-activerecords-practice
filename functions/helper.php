<?php

if ( ! function_exists('is_logged') ) {
	function is_logged() {
		if ( @$_SESSION['is_logged'] ==  true ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists('redirect') ) {
	function redirect($url) {
		header("location: " . $url);
	}
}

if ( ! function_exists('post_validate') ) {
	function post_validate($post) {
		$trim = trim($post);
		$ent = htmlentities($trim);
		return $ent;
	}
}

if ( ! function_exists('dprint') ) {
	function dprint($array) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}

if ( ! function_exists('userdata') ) {
	function userdata() {
		return (isset($_SESSION['userdata'])) ? $_SESSION['userdata'] : "";
	}
} 

if ( ! function_exists('user_logged') ) {
	function user_logged() {
		$userdata = unserialize(userdata());
		return $userdata['username'];
	}
} 

if ( ! function_exists('id_logged') ) {
	function id_logged() {
		$userdata = unserialize(userdata());
		return $userdata['id'];
	}
} 

?>