<?php
function thai($text)
{
	return iconv( 'UTF-8','TIS-620',$text);
}
?>

