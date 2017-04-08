<?php
function change_value_csv($fn, $id, $value_arr) {
$file = $fn . ".csv";
$tmp_file = $fn . "_tmp.csv";
$input = fopen($file, 'r');
$output = fopen($tmp_file, 'w');
while (($data = fgetcsv($input)) !== FALSE) {
	if ($data[0] == $id)
	{
		// echo "supp line pca data[0] = $data[0] == line = $line\n";
		$data = $value_arr;
	}
   fputcsv ($output, $data);}
fclose($input);
fclose($output);
unlink($file);
rename($tmp_file, $file);
}

// function find_line_csv($file_name, $id) {
// 		if (file_exists($file_name) && ($handle = fopen($file_name, 'r')) !== FALSE) {
// 			$i = -1;
// 	    	while (($data = fgetcsv($handle)) !== FALSE) {
// 				$i++;
// 				echo "data[0] is $data[0] && id is $id <br />";
// 				if ($data[0] == $id);
// 					$line = $i;}
// 		fclose($handle);}
// 	return ($line);}
?>
