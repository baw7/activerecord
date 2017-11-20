<?php
ini_set ('display_errors', 'On');
error_reporting(E_ALL);
define('DATABASE','baw7');
define('USERNAME','baw7');
define('PASSWORD','jeqTTp7ze');
define('CONNECTION','sql1.njit.edu');
class Manage {
	public static function autoload($class) {
	include $class . '.php';
	}
}
spl_autoload_register(array('Manage','autoload'));
$obj = new main();
class main
{
	public function __construct() {
	$form = '<form method ="post" enctype="multipart/form-data">';
	$form .= '<b>Table</b> <i>Accounts</i>';
	$form .= 'Select all records';
	$records = accounts::findAll();
        $tableGen = displayTable::generateTableFromMultiArray($records);
	$form .= $tableGen;
	
	$form .= 'Select one record';
	$id = 4;
	$records = accounts::findOne($id);
	$tableGen = displayTable::generateTableFromOneRecord($records);
	$form .= '<i>Retrieved record '.$id.'</i>';
	$form .= $tableGen;
	$form .= 'Insert one record';
	$record = new account();
	$record->email="tej2@njit.edu";
	$record->fname="Tiffany";
	$record->lname="Johnson";
	$record->phone="983-989-9889";
	$record->gender="female";
	$record->password="9876578";
	$lastInsertedId=$record->save();
	$records = accounts::findAll();
	$tableGen = displayTable::generateTableFromMultiArray($records);
	$form .= '<i>Inserted</i>';
	$form .= $tableGen;
        $form .= 'Update one record';
        $records = accounts::findOne($lastInsertedId);
        $record = new account();
        $record->id=$records->id;
        $record->password="09877";
        $record->save();
        $form .= '<i>Updated id '.$records->id.'</i>';
        $records = accounts::findAll();
        $tableGen = displayTable::genarateTableFromMultiArray($records);
        $form .= $tableGen;
        $form .= 'Delete one record';
        $records = accounts::findOne($lastInsertedId);
        $record= new account();
        $record->id=$records->id;
        $record->delete();
	$form .= '<i>Record '.$records->id.' deleted</i>';
	$records = accounts::findAll();
        $tableGen = displayTable::genarateTableFromMultiArray($records);
	$form .= $tableGen;
	$form .= '<b>Table</b> <i>Todos</i>';
	$form .= 'Select all records';
	$records = todos::findAll();
	$tableGen = displayTable::generateTableFromMultiArray($records);
	$form .= $tableGen;
	$form .= 'Select one record';
	$id = 3;
	$records = todos::findOne($id);
	$tableGen = displayTable::generateTableFromOneRecord($records);
	$form .= '<i>Retrieved record '.$id.'</i>';
	$form .= $tableGen;
	$form .= 'Insert one record';
	$record = new todo();
        $record->owneremail="tej2@njit.edu";
        $record->ownerid=24;
        $record->createddate="04-20-2018";
        $record->duedate="11-22-2018";
        $record->message="create mobile application";
        $record->isdone=0;
        $lastInsertedId=$record->save();
	$records = todos::findAll();
	$tableGen = displayTable::generateTableFromMultiArray($records);
	$form .= '<i>Inserted</i>';
	$form .= $tableGen;
        $form .= 'Update one record';
        $records = todos::findOne($lastInsertedId);
        $record = new todo();
        $record->id=$records->id;
	$record->createddate="04-12-2018";
        $record->save();
        $form .= '<i>Updated id '.$records->id.'</i>';
        $records = todos::findAll();
        $tableGen = displayTable::genarateTableFromMultiArray($records);
        $form .= $tableGen;
        $form .= 'Delete one record';
        $records = todos::findOne($lastInsertedId);
        $record = new todo();
        $record->id=$records->id;
        $record->delete();
	$form .= '<i>Record '.$records->id.' deleted</i>';
        $records = todos::findAll();
        $tableGen = displayTable::genarateTableFromMultiArray($records);
        $form .= $tableGen;
        $form .= '</form> ';
	print($form);
	}
}
?>

