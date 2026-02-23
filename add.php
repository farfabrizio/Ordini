<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    //verifichiamo se il codice esiste gia
    if (isset($_POST['Codice'])) {
        $codice = $_POST['Codice'];
        $file = fopen("ordini.csv", "r");
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($data[0] == $codice) {
                echo "Il codice esiste già. Inserisci un codice univoco.";
                echo "<br><a href='home.php'>Torna alla Home</a>";
                fclose($file);
                exit();
            }
        }
        fclose($file);
    }
    if (isset($_POST['Codice']) && isset($_POST['descrizione']) && isset($_POST['Quantità']) && isset($_POST['Prezzo'])) {
        $codice = $_POST['Codice'];
        $descrizione = $_POST['descrizione'];
        $quantita = $_POST['Quantità'];
        $prezzo = $_POST['Prezzo'];
        if (isset($_POST['Status_Ordine'])) {
            $status_ordine = $_POST['Status_Ordine'];
        } else {
            $status_ordine = "Non specificato";
        }


        // salviamo i dati su un file csv
        $file = fopen("ordini.csv", "a");
        $nl = "\n";
        fputcsv($file, [$codice, $descrizione, $quantita, $prezzo, $status_ordine]);

        fclose($file);
        echo "I dati dell'ordine sono stati salvati con successo: <br>";
        echo "<table>
        <tr>
            <th>Campo</th>
            <th>Valore</th>
        </tr>
        <tr>
            <td>Codice</td>
            <td>" . $codice . "</td>
        </tr>
        <tr>
            <td>Descrizione</td>
            <td>" . $descrizione . "</td>
        </tr>
        <tr>
            <td>Quantità</td>
            <td>" . $quantita . "</td>
        </tr>
        <tr>
            <td>Prezzo</td>
            <td>" . $prezzo . "€</td>
        </tr>
        <tr>
            <td>Status Ordine</td>
            <td>" . $status_ordine . "</td>
        </tr>
        <tr>
            <td><strong>Totale Ordine</strong></td>
            <td><strong>" . ($quantita * $prezzo) . "€</strong></td>
    </table>";

        echo "<br><a href='home.php'>Torna alla Home</a>";
    } else {
        echo "Tutti i campi sono obbligatori.";
        echo "<br><a href='home.php'>Torna alla Home</a>";
    }
    ?>

</body>

</html>
<?php
