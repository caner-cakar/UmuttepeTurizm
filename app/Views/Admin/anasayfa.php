<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Anasayfa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .menu {
            width: 200px;
            background-color: #f2f2f2;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            overflow: auto;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
        }
        .menu li {
            padding: 8px 0;
        }
        .menu a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .menu a:hover {
            color: #000;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="<?= base_url('admin/anasayfa'); ?>">Ana Sayfa</a></li>
            <li><a href="<?= base_url('admin/seferEkle'); ?>">Sefer Ekle</a></li>
            <li><a href="<?= base_url('admin/addKullanici'); ?>">Kullanıcı Ekle</a></li>
            <li><a href="<?= base_url('admin/kullaniciListesi'); ?>">Kullanıcı Sil</a></li>
            <li><a href="<?= base_url('admin/goDeleteSefer'); ?>">Sefer Sil</a></li>

            <!-- Diğer menü bağlantıları buraya eklenebilir -->
        </ul>
    </div>
    <div class="content">
        <!-- Ana içerik buraya gelecek -->
        <h1>Anasayfa</h1>
        <p>Hoş geldiniz!</p>
    </div>
</body>
</html>
