<?php

$file = "./" . $argv[1];
$op = $argv[2];

$pos_file = "./pos.txt";
$neg_file = "./neg.txt";

$pos_arr = array();
$neg_arr = array();

// echo $file;
// echo $operation;

// file existance check
if (!file_exists($file)){
	exit("\nFile \"$argv[1]\" not Found!\n");
}
else { 
	// file open check
	$file = fopen($file, "r") or exit("Unable to open file!");
	while (!feof($file)) { 
		// echo $i . "\n";

		// get a file line by line
		$current_line = fgets ($file);

		// echo $current_line . "\n"; 
		
		// split string into words
		$str_arr = explode (" ", $current_line);

		// operation check
		if ($op == '+')
			$res = (float)$str_arr[0]+(float)$str_arr[1];
		elseif ($op == '-')
			$res = (float)$str_arr[0]-(float)$str_arr[1];
		elseif ($op == '*') 
			$res = (float)$str_arr[0]*(float)$str_arr[1];
		elseif ($op == '/') 
			$res = (float)$str_arr[0]/(float)$str_arr[1];
		else{
			exit("\nWrong argument \"$argv[2]\" passed!\n"
				. "Use +-*/ only!\n");
		}

		if ($res>=0)
			array_push($pos_arr, $res);
		else
			array_push($neg_arr, $res);
	}
	fclose($file);
}

echo "\nPositive ";
print_r($pos_arr);
file_put_contents($pos_file, print_r($pos_arr, true));
echo "\nPositive Results are stored in pos.txt\n";

echo "\nNegative ";
print_r($neg_arr);
file_put_contents($neg_file, print_r($neg_arr, true));
echo "\nNegative Results are stored in neg.txt\n";

?>