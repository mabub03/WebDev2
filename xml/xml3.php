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
        echo "<ul><li>" . $books->title . "</li>";
        echo "<li>" . $books->author . "</li>";
        echo "<li>" . $books["category"] . "</li>";
        echo "<li>" . $books->year . "</li>";
        echo "<li>" . $books->price . "</ul>";
    }

    // this is how to grab attributes
    echo $xml->book[1]['category'] . "<br />";
    echo $xml->book[1]->title['lang'];
    ?>
</body>

</html>