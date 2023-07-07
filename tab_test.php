<?php
$servername = "172.17.0.5";
$username = "dhwani";
$password = "dhwani123";
$dbname = "news";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT infodata FROM allnews";
$result = mysqli_query($conn, $sql);

$data = array();
if (mysqli_num_rows($result) > 0) {
    // Fetch data and store in an array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row["infodata"];
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Table Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <table>
	<tr>
		<h1><center> N.E.W.S </center></h1>
        </tr>
        <?php
        foreach ($data as $item) {
            echo "<tr>";
            echo "<td>" . $item . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

