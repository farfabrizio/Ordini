<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Inserimento Ordini</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Inserimento Ordini</h1>

    <form action="add.php" method="post">

        <div class="form-group">
            <label for="Codice">Codice:</label>
            <input type="text" id="Codice" name="Codice" required>
        </div>

        <div class="form-group">
            <label for="Descrizione">Descrizione:</label>
            <select name="descrizione" id="Descrizione">
                <option value="Smartphone Xiaomi">Xiaomi 17c Pro</option>
                <option value="Smartphone Samsung">Samsung Galaxy S24</option>
                <option value="Smartphone Apple">iPhone 15 Pro</option>
                <option value="Smartphone OnePlus">OnePlus 12</option>
                <option value="Smartphone Google">Google Pixel 8 Pro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Quantità">Quantità:</label>
            <input type="number" id="Quantità" name="Quantità" required>
        </div>

        <div class="form-group">
            <label for="Prezzo">Prezzo (€):</label>
            <input type="number" id="Prezzo" name="Prezzo" step="0.01" required>
        </div>

        <div class="form-group">
            <label>Status Ordine:</label>
            <div class="radio-group">
                <input type="radio" name="Status_Ordine" id="In_Corso" value="In Corso" required>
                <label for="In_Corso">In Corso</label>

                <input type="radio" name="Status_Ordine" id="Completato" value="Completato" required>
                <label for="Completato">Completato</label>

                <input type="radio" name="Status_Ordine" id="Annullato" value="Annullato" required>
                <label for="Annullato">Annullato</label>

                <input type="radio" name="Status_Ordine" id="Spedito" value="Spedito" required>
                <label for="Spedito">Spedito</label>
            </div>
        </div>

        <div class="button-group">
            <input type="reset" value="Reset">
            <input type="submit" value="Salva">
            <input type="button" value="Visualizza Ordini" onclick="window.location.href='view.php'">
        </div>
</body>
</form>