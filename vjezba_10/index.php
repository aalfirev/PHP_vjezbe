<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prebrojavanje riječi</title>
</head>
<body>
    <h1>Prebrojavanje riječi u rečenici</h1>
    <form method="POST">
        <label for="sentence">Unesite rečenicu:</label><br>
        <textarea id="sentence" name="sentence" rows="4" cols="50" placeholder="Unesite rečenicu ovdje..."></textarea><br><br>
        <button type="submit">Prebroji riječi</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['sentence'])) {
        $sentence = $_POST['sentence'];
        
        
        $wordCount = str_word_count($sentence);

        echo "<h2>Rezultat:</h2>";
        echo "<p>Rečenica: <em>" . htmlspecialchars($sentence) . "</em></p>";
        echo "<p>Ukupno riječi: <strong>$wordCount</strong></p>";
    }
    ?>
</body>
</html>
