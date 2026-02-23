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
                <option value="">- - - -</option>

                <?php 
                // leggo il file csv per estrarre gli status ordine unici
                $file = fopen("ordini.csv", "r");
                $status_ordine_unici = [];
                while (($data = fgetcsv($file)) !== FALSE) {
                    if (!in_array($data[4], $status_ordine_unici)) {
                        $status_ordine_unici[] = $data[4];
                    }
                }
                fclose($file);
                foreach ($status_ordine_unici as $status) {
                    echo "<option value='" . $status . "'>" . $status . "</option>";
                }
                ?>
            </select>
            <label for="Descrizione">Filtra per Descrizione:</label>
            <select name="Descrizione" id="Descrizione">
                    <option value="">- - - -</option>
                <?php 
                // leggo il file csv per estrarre le descrizioni uniche
                $file = fopen("ordini.csv", "r");
                $descrizioni_uniche = [];
                while (($data = fgetcsv($file)) !== FALSE) {
                    if (!in_array($data[1], $descrizioni_uniche)) {
                        $descrizioni_uniche[] = $data[1];
                    }
                }
                fclose($file);
                foreach ($descrizioni_uniche as $descrizione) {
                    echo "<option value='" . $descrizione . "'>" . $descrizione . "</option>";
                }
                ?>
            </select>
                  
        </div>

        <div class="button-group">
            <input type="submit" value="Visualizza">
        </div>
    </form>
    <?php
    if (isset($_POST['Status_Ordine'])||isset($_POST['Descrizione'])) {
        $status_ordine = $_POST['Status_Ordine'];
        $descrizione = $_POST['Descrizione'];
    } else {
        $status_ordine = "";
        $descrizione = "";
    }
    // leggiamo i dati dal file csv
    $file = fopen("ordini.csv", "r");
    echo "<table border='1'>";
    echo "<tr><th>Codice</th><th>Descrizione</th><th>Quantità</th><th>Prezzo</th><th>Status Ordine</th></tr>";
    $totale = 0;
    while (($data = fgetcsv($file)) !== FALSE) {
        if (($status_ordine == "" || $data[4] == $status_ordine) && ($descrizione == "" || $data[1] == $descrizione))    {
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