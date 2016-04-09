<?php
####-----------------------------------------------------------------------####
#  config.php
#  12.01.2015
#  ver: 1.0
#  rev: 0
#  D'ssConnecTed
#  benimprojem@yandex.com 
#
####-----------------------------------------------------------------------####

####----------------------  Database config array  ------------------------####
  $dbset = array(
      'host'      => 'localhost',         // Db Host------------------------
      'user'      => 'root',              // Db user name
      'pass'      => 'vertrigo',          // Db password
	    'database'  => 'sirket',            // Db Name
	    'setname'   => 'UTF8',              // Değiştirme---------------------
	    'setchar'   => 'UTF8',              // Değiştirme---------------------
	    'collation' => 'utf8_general_ci',   // Değiştirme---------------------
  );
	
  $sqlcounter = -3;  // sql sorgu sayısı değişkeni....................... //Değiştirme
	/* 
	    -3 olmasının nedeni...
            fsql("query","SET NAMES ".$dbset['setname']);                     // 1
            fsql("query","SET CHARACTER SET ".$dbset['setchar']);             // 2
            fsql("query","SET COLLATION_CONNECTION = ".$dbset['collation']);  // 3
	    _mysql.php de zaten 3 kez kullanılmış olmasından kaynaklanıyor...
    */

?>
