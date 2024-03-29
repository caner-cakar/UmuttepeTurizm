<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Seferleri Listele</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 100%;
            margin: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td:last-child {
            text-align: center;
        }
        button[type="submit"] {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
            table {
                font-size: 14px;
            }
            td, th {
                padding: 6px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Seferleri Listele</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rota</th>
                    <th>Kalkış Saati</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seferler as $sefer): ?>
                    <tr>
                        <td><?= $sefer['seferID'] ?></td>
                        <td><?= $sefer['kalkisSehir'] ?> - <?= $sefer['varisSehir'] ?></td>
                        <td><?= $sefer['cikisZamani'] ?> <?= $sefer['cikisSaati'] ?></td>
                        <td>
                            <form action="<?= site_url('admin/deleteSefer') ?>" method="post">
                                <input type="hidden" name="seferID" value="<?= $sefer['seferID'] ?>">
                                <button type="submit">Sil</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= site_url('admin/anasayfa') ?>">Anasayfa</a>
    </div>
</body>
</html>
