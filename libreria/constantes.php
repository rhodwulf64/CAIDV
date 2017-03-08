<?php
	session_start();
	define(BD,($_SESSION['base_datos'])?$_SESSION['base_datos']:'bd_caidv');
	define(HOST,'127.0.0.1');
	define(USER,'job');
	define(PASS,'1234');
?>
