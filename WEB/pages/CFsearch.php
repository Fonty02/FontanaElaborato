<?php
$in=$_GET['txt'];
if(!ctype_alnum($in)){
echo "Data Error";
exit;
}

$msg="";
$msg="<select id=s1 size='15'>";
if(strlen($in)>0 ){
$sql="select Nome, CF from utenti where Nome like '%$in%'";
foreach ($con->query($sql) as $nt) {
$msg .="<option value=$nt[CF]>$nt[Nome] => $nt[CF]</option>";

}
}
$msg .='</select>';
echo $msg;
?>