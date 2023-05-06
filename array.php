<?php
//indexed array
$faculty = array("CSIT","BCA","BIM");
sort($faculty);

for($i=0; $i<count($faculty);$i++){
    echo "$faculty[$i] <br>";
}

foreach($faculty as $f){
    echo '<br>' . $f;
}

//associative array
$fac =array("CSIT" => 48, "BCA" => 36);
//echo $fac['BCA'];
krsort($fac);

foreach($fac as $f => $v){
    echo "<br>Faculty $f has $v students";
}

//multidimentional array
$myarr = array(array("BCA","BIM"),array("CSIT","BIT"));

echo "<br>";
echo $myarr[1][1];

// sort() => sort indexed array in ascending order
// rsort() => sort indexed array in decending order
// asort() => sort associative array in ascending array by value
// arsort() => sort associative array in decending order by value
// ksort() => sort associative array in ascending order by key
// krsort() => sort associative array in decending order by key
?>