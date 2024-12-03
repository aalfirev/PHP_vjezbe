<?php
require_once 'dbconn.php'; 
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretraživanje korisnika</title>
</head>
<body>
    <h1>Pretraživanje korisnika</h1>
    <form action="" method="GET">
        <label for="query">Unesite ime ili prezime korisnika:</label><br>
        <input type="text" id="query" name="query" required><br><br>
        <button type="submit">Pretraži</button>
    </form>

    <?php
    if (isset($_GET['query'])) {
        $query = $_GET['query']; 
        $query = "%$query%"; 

      
        $sql = "SELECT id, name, lastname FROM users WHERE name LIKE ? OR lastname LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $query, $query);
        $stmt->execute();
        $result = $stmt->get_result();

      
        if ($result->num_rows > 0) {
            echo "<h2>Rezultati pretraživanja:</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                       
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['lastname']}</td>
                        
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nema rezultata za uneseni pojam.</p>";
        }

        $stmt->close();
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
