<?php
require_once 'dbconn.php'; 

$sql = "SELECT users.id, users.first_name, users.last_name, users.email, countries.country_name, users.country_id 
        FROM users 
        JOIN countries ON users.country_id = countries.id";
$result = $conn->query($sql);


$sql_countries = "SELECT id, country_name FROM countries";
$countries_result = $conn->query($sql_countries);

$countries = [];
while ($row = $countries_result->fetch_assoc()) {
    $countries[$row['id']] = $row['country_name'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country_id = $_POST['country_id'];

    $update_sql = "UPDATE users SET first_name = ?, last_name = ?, country_id = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssii", $first_name, $last_name, $country_id, $user_id);

    if ($stmt->execute()) {
        echo "<p>Korisnik je uspješno ažuriran!</p>";
    } else {
        echo "<p>Greška prilikom ažuriranja: " . $conn->error . "</p>";
    }
    $stmt->close();
    header("Location: korisnici.php");
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista korisnika</title>
</head>
<body>
    <h1>Lista korisnika</h1>

  
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Država</th>
            <th>Akcije</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['country_name']); ?></td>
                    <td>
                     
                        <form action="korisnici.php" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
                            <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
                            <select name="country_id" required>
                                <?php foreach ($countries as $id => $name): ?>
                                    <option value="<?php echo $id; ?>" <?php if ($id == $row['country_id']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit">Spremi</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nema korisnika.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
