<!DOCTYPE html>
<html lang="en">

<head>
    <title>Playing Around With XML data binding</title>
    <link rel="stylesheet" type="text/css" href="books.css" />
</head>

<body>
    <h1>Playing Around With XML data binding</h1>
    <?php
    $xml = simplexml_load_file("books.xml") or die("Error: The xml object couldnot be created");

    foreach ($xml->children() as $books) {
        echo $books->title . ", ";
        echo $books->author . ", ";
        echo $books->year . ", ";
        echo $books->price . "<br />";
    }
    ?>
</body>

</html>