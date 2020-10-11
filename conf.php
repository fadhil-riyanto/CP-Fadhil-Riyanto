<?php
//================================ MIT LICENSE ==================================
// Copyright (c) 2015 - 2020 Fadhil Riyanto

// Permission is hereby granted, free of charge, to any person obtaining a copy of
//  this software and associated documentation files (the "Software"), to deal in 
// the Software without restriction, including without limitation the rights to use,
//  copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
//  Software, and to permit persons to whom the Software is furnished to do so, 
// subject to the following conditions:

// The above copyright notice and this permission notice shall be included in all 
// copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
//  INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
// PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
//  HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
//  OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
// SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


//=============================== MYSQL FUNCTIONS ==========================================
$db_mysqli_server                = "localhost";         //your mysql server (Please change)
$db_mysqli_database              = "admin";             //your mysql database name (Please change)
$db_mysqli_username              = "root";              //your mysql username (Please change)
$db_mysqli_password              = "root";              //your mysql password (Please change)

//====================================== MACHINE ============================================
$machine_author                  = "Fadhil Riyanto";    //author name
$machine_year_development        = "2015-2020";         //development year
$machine_name                    = "Fadhil Riyanto CP"; //machine name
$machine_license                 = "MIT";               //machine license
$path_icon_title                 = "";                   //Path Icon in <title> html tag

//======================================== owner ===========================================
$name_owner                      = "Fadhil Riyanto";

//============================== SYSTEM (Don't change it) ==================================

$get_hostname = gethostname();
$memory_size = memory_get_usage();
// Specify memory unit
$memory_unit = array('Bytes','KB','MB','GB','TB','PB');
// Display memory size into kb, mb etc.
$used_memory = round($memory_size/pow(1024,($x=floor(log($memory_size,1024)))),2).' '.$memory_unit[$x]."\n";
//Get CPU Usage
function get_cpu_usage()
{
	$cmd = "wmic cpu get loadpercentage";
	exec($cmd,$output,$value);
	if($value==0)
	{
		return $output[1];
	}
	else
	{
		return "Cannot Get CPU Usage!";
	}
}

?>