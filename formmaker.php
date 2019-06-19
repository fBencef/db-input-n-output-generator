<?php
//DATABASE
//mysql options
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
//GENERATING FORM
function GetForm($sitename) {
	global $db;
	$sql='SELECT * FROM `forms` where `site` like "'.$sitename.'"order by sort asc';
	$query = $db->query($sql);
	//$row = $query->fetch_object();
	//if (isset($row->formname) == false) {	//Check name
		//echo 'HIBA! ÉRVÉNYTELEN NÉV.';		//Error mesage
	//}else {
		echo 'FORM<br>'/*<form name="'.$row->formname.'">'*/;

		while ($row = $query->fetch_object()) {		
			if ($row->input_type == "choice") {		//Drop-down menu
				$ch_array=$row->choices;
				$choices = explode(",",$ch_array);
				echo '<select>';
				echo'<option disabled selected neme="'.$row->formname.'" value>--Kiválasztás--</option>';
				for ($i=0; $i < count($choices); $i++) {
					echo '<option name="'.$row->formname.'" value="Admin">'.$choices[$i].'</option>';
				}
				echo '</select>'.$row->fieldlabel.'<br>';
			}elseif ($row->input_type == "radio") {		//Radio buttons
				$ch_array=$row->choices;
				$choices = explode(",",$ch_array);
				echo $row->fieldlabel.'<br>';
				for ($i=0; $i < count($choices); $i++) {
					echo '<input type="radio" name="'.$row->formname.'" id="'.$i.'" value="Admin">'.$choices[$i].'</input><br>';
				}
			}elseif ($row->input_type == "checkbox") {		//Checkboxes
				$ch_array=$row->choices;
				$choices = explode(",",$ch_array);
				echo $row->fieldlabel.'<br>';
				for ($i=0; $i < count($choices); $i++) {
					echo '<input type="checkbox" name="'.$row->formname.'" id="'.$i.'" value="Admin">'.$choices[$i].'</input><br>';
				}
			}elseif ($row->input_type == "text") {			//Text
				echo '<input type="'.$row->input_type.'">'.$row->fieldlabel.'</input><br>';
			}elseif ($row->input_type == "password") {			//Password
				echo '<input type="'.$row->input_type.'">'.$row->fieldlabel.'</input><br>';
			}elseif ($row->input_type == "date") {			//Date
				echo '<input type="'.$row->input_type.'">'.$row->fieldlabel.'</input><br>';
			}elseif ($row->input_type == "number") {			//Number
				echo '<input type="'.$row->input_type.'">'.$row->fieldlabel.'</input><br>';
			}elseif ($row->input_type == "submit") {			//Submit
				echo '<input type="'.$row->input_type.'" value="'.$row->fieldlabel.'"><br>';
			}else {
				echo 'ERROR! Incorrect or not supported input type at: <b>'.$row->sort.', '.$row->fieldname.'</b><br>';
			}
		}	
	//}
	echo '</form>';
}	
?>

<!--}else {
				echo '<input type="'.$row->input_type.'">'.$row->fieldlabel.'</input><br>';-->