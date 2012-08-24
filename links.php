<?php

//  $testing = True ; 
 $testing = False ; 


op( "entering links.php <BR>", $testing) ; 


function op($txt, $lTesting) {
  if ( $lTesting == True ) 
  {
    echo $txt."<BR>" ; 
  }
  return True;
}


function f_parse_csv($file, $longest, $delimiter) {
 // from php.net - http://php.net/manual/en/function.str-getcsv.php
  $mdarray = array();
  $file    = fopen($file, "r");
  while ($line = fgetcsv($file, $longest, $delimiter)) {
    array_push($mdarray, $line);
    }
  fclose($file);
  return $mdarray;
  }

function fixURL($url, $includeHREF ) {
   // written by Duncan Murray 10/8/2012 to get the proper text of a URL
      $properURL = ""; 
	switch( substr($url, 0, 4) )
      {
	case "http":
      	$properURL= $url;
	      break;
	case "www.":
        	$properURL="http://".$url;
		break;
	default:
      	$properURL="http://www.".$url;
		break;
	}
	if ( $includeHREF == true )
	{
		$properURL = "<a href=".$properURL.">".$properURL."</a>";
	}
	return $properURL; 
}

op("links.php - about to read text file to array<BR>", $testing) ; 


// load the list of sites from a text file 
$file_handle = fopen("links.txt", "rb");

while (!feof($file_handle) ) {
	$a[] = fgets($file_handle);
}

fclose($file_handle);


//get the q parameter from URL
$q=$_GET["q"];

$totRecs = 0;

op("links.php - searching for '".$q."'", $testing ); 

//lookup all urls from array 
if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (strpos($a[$i],$q) > 0 )
      {
		$hint = $hint."<BR>".fixURL( $a[$i] , True ) ;
		$totRecs = $totRecs + 1; 
      }
    }
  }


if ($hint == "")
  {
  $response="no matches on ".$q;
  }
else
  {
	$hint = $totRecs." results found containing ".$q."<BR>".$hint."<BR>" ;
	$response=$hint;
  }

echo $response;
?>