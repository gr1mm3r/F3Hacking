<?php
	$diff= round(intval($_GET['length'])/2);	
	$wordsarray = file('words/'.$_GET['length'].'.txt');
	$passarray = array();
	$endArr = array();
	$correct = $wordsarray[rand(0,count($wordsarray)-1)];
	foreach ($wordsarray as $elem){	if (levenshtein($correct, $elem) <= $diff){array_push($endArr, $elem);}}
	for ($i=1;$i<= intval($_GET['count'])-1 ;$i++){
		$fakepass = $endArr[rand(0,count($endArr)-1)];
		array_push($passarray, $fakepass);}
	$results = str_replace("\n",'',"{\"words\" : [\"".$correct."\", \"".implode('","', $passarray)."\" ]}");
	$exitstatus = 1;
	echo $results;
