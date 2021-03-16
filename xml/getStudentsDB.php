<?php 
$query = intval($_GET["query"]);

// mysqli_connect(localhost, user login name, password, database)
$conn = mysqli_connect('localhost', 'root', '', 'students');

// if we can't reach the database then the process will die
// die function parameter is an error message
// as devs we debug with this
if(!$conn) {
    die("Database Error: " . mysqli_error());
}

mysqli_select_db($conn, "students");

// usually should be done as stored procedure on database and not like this example
$sql = "SELECT * FROM tblstudents WHERE StudentID = '" . $query . "'";

$result = mysqli_query($conn, $sql);

echo "<table><tr><th>First Name</th><th>Last Name</th><th>Major</th><th>Dorm</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Fname'] . "</td>";
    echo "<td>" . $row['Lname'] . "</td>";
    echo "<td>" . $row['Major'] . "</td>";
    echo "<td>" . $row['Dorm'] . "</td>";
    echo "<tr>";
}
    
echo "</table>";

mysqli_close($conn);
?>