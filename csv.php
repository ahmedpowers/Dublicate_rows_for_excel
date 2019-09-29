<?php

$dat= array(); 

array_shift($dat);
$row = 0;
$dat[]= array();
if (($handle = fopen("moneycsvtest.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
      
		
        
		$dat[$row]= $data;
		$row++;
		
		
    }
    fclose($handle);
}

for ($c=0; $c < count($dat); $c++) {
						
						if($dat[$c][9] > 1){
						$temp = $dat[$c]; 
						$dat[$c][9] = $dat[$c][9] - 1;

						array_splice($dat, $c, 0, array($temp));

						

			} 
         
        }

$fp = fopen('moneycsvtest.csv', 'w');

foreach ($dat as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);




