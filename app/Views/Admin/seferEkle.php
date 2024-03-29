<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Sefer Ekle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sefer Ekle</h1>
        <form action="<?= base_url('admin/save'); ?>" method="post">
            <label for="kalkisSehir">Kalkış Şehri:</label>
            <input type="text" id="kalkisSehir" name="kalkisSehir" required>

            <label for="varisSehir">Varış Şehri:</label>
            <input type="text" id="varisSehir" name="varisSehir" required>

            <label for="cikisZamani">Çıkış Zamanı:</label>
            <input type="date" id="cikisZamani" name="cikisZamani" required>

            <label for="cikisSaati">Çıkış Saati:</label>
            <input type="time" id="cikisSaati" name="cikisSaati" required>

            <label for="varisZamani">Varış Zamanı:</label>
            <input type="date" id="varisZamani" name="varisZamani" required>

            <label for="varisSaati">Varış Saati:</label>
            <input type="time" id="varisSaati" name="varisSaati" required>

            <label for="yolculukSuresi">Yolculuk Süresi:</label>
            <input type="text" id="yolculukSuresi" name="yolculukSuresi" required>

            <label for="otobusAdi">Otobüs Adı:</label>
            <input type="text" id="otobusAdi" name="otobusAdi" required>

            <label for="koltukTipi">Koltuk Tipi:</label>
            <input type="text" id="koltukTipi" name="koltukTipi" required>

            <label for="ucret">Ücret:</label>
            <input type="text" id="ucret" name="ucret" required>

            <button type="submit">Kaydet</button>
        </form>
    </div>
</body>
</html>
