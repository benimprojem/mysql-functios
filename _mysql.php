<?php
####-----------------------------------------------------------------####
#  _mysql.php
#  02.01.2015
#  ver: 1.0
#  rev: 0 
#  D'ssConnecTed
#  benimprojem@yandex.com
#  
####-----------------------------------------------------------------####
require_once("Config.php");
####----------------------  DB START CONNECT  ----------------------####
    $conn = fsql("connect",$dbset['host'],$dbset['user'],$dbset['pass']);     // 0
            fsql("selectdb",$dbset['database']);                              // 0
            fsql("query","SET NAMES ".$dbset['setname']);                     // 1
            fsql("query","SET CHARACTER SET ".$dbset['setchar']);             // 2
            fsql("query","SET COLLATION_CONNECTION = ".$dbset['collation']);  // 3
####--------------------  DB Functions START  -----------------------####
	
	function fsql($fn,$s='',$r='0',$f='null'){
	    global $txt,$sqlcounter;
	    switch($fn){
        case'query':     $re = mysql_query($s);$sqlcounter++;  break;
	    	case'farray':    $re = mysql_fetch_array($s);          break;
    		case'fassoc':    $re = mysql_fetch_assoc($s);          break;
	    	case'numrow':    $re = mysql_num_rows($s);             break;
	    	case'affrow':    $re = mysql_affected_rows($s);        break;
			  case'result':    $re = mysql_result($s,$r,$f);         break;
	    	case'freeresult':$re = mysql_free_result($s);          break;
			  case'insert':    $re = mysql_query("INSERT INTO ".$s." (".$r.") VALUES (".$f.")");$sqlcounter++; break;
			  case'insertid':  $re = mysql_insert_id();              break;
			  case'list':      $re = mysql_list_tables ($s,$r);      break;
			  case'connect':   return @mysql_connect($s,$r,$f) or die($txt['dberror']); break;
			  case'selectdb':  return @mysql_select_db($s) or die('['.$s.']'.$txt['dbserror']); break;
	    	case'close':     return mysql_close($s);               break;
			  case'counter':   $re = $sqlcounter;                    break;
			  case'help':      $re ="<code><br /><br />
####----------------------  FUNCTION LIST  --------------------------####<br />
# Funtions List ...                        require_once('_mysql.php');<br />
# <br />
# fsql(\"query\",\$sql); --------------------  mysql_query(\$sql);<br />
# fsql(\"farray\",\$result); ----------------  mysql_fetch_array(\$result);<br />
# fsql(\"fassoc\",\$result); ----------------  mysql_fetch_assoc(\$result);<br />
# fsql(\"numrow\",\$result); ----------------  mysql_num_rows(\$result);<br />
# fsql(\"affrow\",\$result); ----------------  mysql_affected_rows(\$result);<br />
# fsql(\"insert\",\$table,\$cell,\$value); --  mysql_query(\"INSERT INTO '.\$table.' ('.\$cell.') VALUES ('.\$value.')\");<br />
# fsql(\"insertid\"); -----------------------  mysql_insert_id();<br />
# fsql(\"list\",\$dbset['database'],\$conn);   mysql_list_tables (\$dbset['database'],\$conn);<br />
# fsql(\"freeresult\",\$result); ------------  mysql_free_result(\$result);<br />
# fsql(\"result\",\$sql,\$row,\"filed\"); ---  mysql_result(\$sql,\$row,\"filed\");<br />
# fsql(\"connect\",\$dbhost,\$dbuser,\$dbpass); @mysql_connect(\$db_host,\$db_user,\$db_pass)or die(\$txt['db_error']);<br />
# fsql(\"selectdb\",\$database_name); -------  @mysql_select_db(\$database_name)or die('['.\$database_name.']'.\$txt['sdb_error']);<br />
# fsql(\"close\"); --------------------------  mysql_close();<br />
# fsql(\"counter\"); ------------------------  Counter sql<br />
####----------------------  FUNCTION LIST END  ----------------------####<br />
<br /><br /></code>";
        }
		return $re;
	}
####----------------------  FUNCTION LIST  --------------------------####
#   Funtions List ...                        require_once('_mysql.php');
#
#   fsql("query",$sql); -------------------  mysql_query($sql);
#   fsql("farray",$result); ---------------  mysql_fetch_array($result);
#	  fsql("fassoc",$result); ---------------  mysql_fetch_assoc($result);
#   fsql("numrow",$result); ---------------  mysql_num_rows($result);
#	  fsql("affrow",$result); ---------------  mysql_affected_rows($result);
#   fsql("insert",$table,$cell,$value); ---  mysql_query("INSERT INTO ".$table." (".$cell.") VALUES (".$value.")");
#	  fsql("insertid"); ---------------------  mysql_insert_id();
#   fsql("list",$dbset['database'],$conn);   mysql_list_tables ($dbset['database'],$conn);
#	  fsql("freeresult",$result); -----------  mysql_free_result($result);
#	  fsql("result",$sql,$row,"filed"); -----  mysql_result($sql,$row,"filed");
#   fsql("connect",$dbhost,$dbuser,$dbpass); @mysql_connect($dbhost,$dbuser,$dbpass) or die($txt['dberror']);
#   fsql("selectdb",$dbset['database']); --  @mysql_select_db($dbset['database']) or die('['.$dbset['database'].']'.$txt['sdberror']);
#	  fsql("close",$conn); ------------------  mysql_close($conn);
#   fsql("counter"); ----------------------  Counter sql
#   fsql("help"); -------------------------  fsql() Functions List

/*
    //fsql("insert",$table,$cell,$value);
        $table= "categories";                     // Table names
        $cell = "'id','name','catup_id','media'"; // cell names
        $value= "'NULL','MP3s','0','mp3.jpg'";    // cell values
        fsql("insert",$table,$cell,$value);

*/
?>
