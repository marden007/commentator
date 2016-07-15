<?php
require_once '/conf.php';

	function clean($value = "") 
	{
	    $value = trim($value);
	    $value = stripslashes($value);
	    $value = strip_tags($value);
	    $value = htmlspecialchars($value);
	    return $value;
	}


	function display_sort($data, $parent = 0, $level = 0)
	{
	   $arr = $data[$parent];

	   for($i = 0; $i < count($arr); $i++)
	   {
	       	echo '<div id="comment" style="padding-left:'. $level .'px;">';
			echo "<b>".$arr[$i]['username']."</b>";
			echo "<p>".$arr[$i]['comment_text']."</p>";
			echo '<a href="replyAdd.php?comment_id='. $arr[$i]['id'] .'">Ответить</a>';
			echo '<a href="comentDel.php?comment_id='. $arr[$i]['id'] .'">Удалить</a>';

	        if(isset($data[$arr[$i]['id']])) display_sort($data, $arr[$i]['id'], 25);
	        echo "</div>";	
	   }
	}
?>