<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Visualizza Ordini</h1>
    <!-- creiamo una selection per visualizzare gli ordini -->
    <form action="" method="post">
        <div class="form-group">
            <label for="Status_Ordine">Filtra per Status Ordine:</label>
            <select name="Status_Ordine" id="Status_Ordine">
                <option value="">Tutti</option>
                <option value="In Corso">In Corso</option>
                <option value="Completato">Completato</option>
                <option value="Annullato">Annullato</option>
                <option value="Spedito">Spedito</option>
            </select>
        </div>

        <div class="button-group">
            <input type="submit" value="Visualizza">
        </div>
    </form>
    <?php
    if (isset($_POST['Status_Ordine'])) {
        $status_ordine = $_POST['Status_Ordine'];
    } else {
        $status_ordine = "";
    }
    // leggiamo i dati dal file csv
    $file = fopen("ordini.csv", "r");
    echo "<table border='1'>";
    echo "<tr><th>Codice</th><th>Descrizione</th><th>Quantità</th><th>Prezzo</th><th>Status Ordine</th></tr>";
    $totale = 0;
    while (($data = fgetcsv($file)) !== FALSE) {
        if ($status_ordine == "" || $data[4] == $status_ordine) {
            echo "<tr>";
            echo "<td>" . $data[0] . "</td>";
            echo "<td>" . $data[1] . "</td>";
            echo "<td>" . $data[2] . "</td>";
            echo "<td>" . $data[3] . "€</td>";
            echo "<td>" . $data[4] . "</td>";
            echo "</tr>";
            $totale += $data[2] * $data[3];
        }
    }
    fclose($file);
    echo "<tr><td colspan='3' style='text-align:right;'><strong>Totale:</strong></td><td>" . $totale . "€</td></tr>";
    echo "</table>";

    echo "<br><a href='home.php'>Torna alla Home</a>";
    ?>
</body>

</html>