<?php
$xml = simplexml_load_file("books.xml") or die("Error: The xml object couldnot be created");

echo $xml->book[0];
