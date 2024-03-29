<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kullanıcı Ekle</title>
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
        input[type="email"],
        input[type="password"],
        select {
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
        <h1>Kullanıcı Ekle</h1>
        <form action="<?= base_url('admin/saveUser'); ?>" method="post">
            <label for="tcKimlik">TC Kimlik:</label>
            <input type="text" id="tcKimlik" name="tcKimlik" required>

            <label for="ad">Ad:</label>
            <input type="text" id="ad" name="ad" required>

            <label for="soyad">Soyad:</label>
            <input type="text" id="soyad" name="soyad" required>

            <label for="dogumTarihi">Doğum Tarihi:</label>
            <input type="date" id="dogumTarihi" name="dogumTarihi" required>

            <label for="cinsiyet">Cinsiyet:</label>
            <select id="cinsiyet" name="cinsiyet" required>
                <option value="Erkek">Erkek</option>
                <option value="Kadın">Kadın</option>
            </select>

            <label for="cepTelefonu">Cep Telefonu:</label>
            <input type="text" id="cepTelefonu" name="cepTelefonu">

            <label for="mail">E-Posta:</label>
            <input type="email" id="mail" name="mail" required>

            <label for="sifre">Şifre:</label>
            <input type="password" id="sifre" name="sifre" required>

            <label for="bakiye">Bakiye:</label>
            <input type="text" id="bakiye" name="bakiye" required>

            <button type="submit">Kaydet</button>
        </form>
    </div>
</body>
</html>
