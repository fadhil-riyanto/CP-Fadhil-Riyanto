<?php
//============================== SYSTEM (Don't change it) ==================================
//=================== Hostname ==========================
$get_hostname = gethostname();

//============================ Get memory usage ========================
$memory_size = memory_get_usage();
$memory_unit = array('Bytes','KB','MB','GB','TB','PB');
$used_memory = round($memory_size/pow(1024,($x=floor(log($memory_size,1024)))),2).' '.$memory_unit[$x]."\n";

//============================= Get CPU Usage ==========================
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
