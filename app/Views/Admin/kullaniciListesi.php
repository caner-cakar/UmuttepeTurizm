<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kullanıcı Listesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        @media screen and (max-width: 600px) {
            table {
                border: 1px solid #ddd;
            }
            th, td {
                padding: 4px;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kullanıcı Listesi</h1>
        <table>
            <thead>
                <tr>
                    <th>TC Kimlik</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Doğum Tarihi</th>
                    <th>Cinsiyet</th>
                    <th>Cep Telefonu</th>
                    <th>E-Posta</th>
                    <th>Bakiye</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kullanicilar as $kullanici): ?>
                    <tr>
                        <td><?= $kullanici['tcKimlik'] ?></td>
                        <td><?= $kullanici['ad'] ?></td>
                        <td><?= $kullanici['soyad'] ?></td>
                        <td><?= $kullanici['dogumTarihi'] ?></td>
                        <td><?= $kullanici['cinsiyet'] ?></td>
                        <td><?= $kullanici['cepTelefonu'] ?></td>
                        <td><?= $kullanici['mail'] ?></td>
                        <td><?= $kullanici['bakiye'] ?></td>
                        <td>
                        <form action="<?= site_url('admin/deleteUser') ?>" method="post">
                            <input type="hidden" name="kullaniciID" value="<?= $kullanici['kullaniciID'] ?>">
                            <button type="submit">Sil</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
