<?php
//ADATBÁZIS
//mysql beállítások
$MYSQL_HOST = "localhost";
$MYSQL_USER = "root";
$MYSQL_PASSWORD = "";
$MYSQL_DB="administration";

$db = mysqli_connect("$MYSQL_HOST","$MYSQL_USER","$MYSQL_PASSWORD","$MYSQL_DB") or die("Adatbázis hiba " . mysqli_error($db));
$db->set_charset("utf8");
?>

<!--?php
//LEKÉRDEZÉS

function GetForm($site,$formname,$sort,$out) {
	
	global $db;
	$sql='SELECT * FROM `forms` WHERE `site`="'.$site.'" AND `formname`="'.$formname.'" AND `sort`="'.$sort.'"';
	$query = $db->query($sql);
	$row = $query->fetch_object();
	return $row->$out;
}


//SELECT sort FROM `forms` WHERE `site`="vehicles" AND `formname`="add_veh"
?-->

<!--?php
//GENERÁLÁS
function formmaker($formname) {
echo '<form>';
echo GetForm("vehicles","add_veh","fieldlabel");
echo '<input type="'.GetForm("vehicles","add_veh","input_type").'">
</input>';
echo '</form>';
}
?-->

<!--?php
//GENERÁLÁS
function Addvehicle($formname) {
echo 'JÁRMŰ HOZZÁADÁSA<br><form>';
echo ''.GetForm("vehicles","add_veh","fieldlabel").' <input type="'.GetForm("vehicles","add_veh","input_type").'">
</input>';
echo '</form>';
}
?-->

<!--?php
//GENERÁLÁS
function MakeForm(/*$submit_to*/) {	
$range = GetFormRange("vehicles","add_veh");
	for($i=1; $i<$range; $i++) {

		//$action=GetForm("vehicles","add_veh",$i,"submit_to").'.php';
		$input_type=GetForm("vehicles","add_veh",$i,"input_type");
		//echo'
		//<form action="submitveh.php">'
		//return $action;
		//return ''.$action.'<br>'.$input_type.'';
		return ''.$input_type.'<br>';
	}
}
?-->

<?php
//ADATGYŰJTÉS
function DbInput() {
global $db;
	$sql='SELECT * FROM `forms`';
	$query = $db->query($sql);
	$row = $query->fetch_object();
	while($row = mysql_fetch_assoc($row))
	{
	echo $row->sort;
	}
}

/*function DbInput() {
global $db;
	$sql='SELECT * FROM `forms` where sort like 1';
	$query = $db->query($sql);
	$row = $query->fetch_object();
	return $row->choices;
}*/
?>