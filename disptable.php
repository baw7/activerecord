<?php
class disptable{
    public static function generateTableFromMultiArray($arr){
            $tableGen = '<table border="4">';
        foreach($arr as $row => $innerArray){
            $tableGen .= '<tr>';
        foreach($innerArray as $innerRow => $value){
            $tableGen .= '<th>' . $innerRow . '</th>';
}
            $tableGen .= '</tr>';
            break;
	    }
        foreach($arr as $row => $innerArray){
            $tableGen .= '<tr>';
        foreach($innerArray as $innerRow => $value){
            $tableGen .= '<td>' . $value . '</td>';
	    }
	    $tableGen .= '</tr>';
	    }
            $tableGen .= '</table><hr>';
            return $tableGen;
	    }
    public static function generateTableFromOneRecord($innerArray){
            $tableGen = '<table border="4">';
            $tableGen .= '<tr>';
        foreach($innerArray as $innerRow => $value){
            $tableGen .= '<th>' . $innerRow . '</th>';
	    }
            $tableGen .= '</tr>';
        foreach($innerArray as $value){
            $tableGen .= '<td>' . $value . '</td>';
	    }
        $tableGen .= '</tr></table><hr>';
        return $tableGen;
	}
}
?>
