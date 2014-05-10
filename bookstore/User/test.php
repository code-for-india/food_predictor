<?php

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions/dbfunctions.php');

$books = array(
	   'bookname'=>'name'	   
        );
print_r($books);
SaveCollection('BookStore',$books);

?>
