<?php
require ("config.inc.php");

class database {
	function connect($host,$database) {
		// $ts_pw = posix_getpwuid(posix_getuid());
		// $ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
		$ts_mycnf = array(user => 'root', password => '');
		$db = mysql_connect($host, $ts_mycnf['user'], $ts_mycnf['password']);
		unset($ts_mycnf, $ts_pw);
		
		mysql_select_db($database);
	}
	
	function query($query) {
	}
}