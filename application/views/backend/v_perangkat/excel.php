<!DOCTYPE html>
<html>

<head>
    <title>Export
        <?= $judul; ?>
    </title>
</head>

<body>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Perangkat yang Diajukan.xlsx");
    ?>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <div style="text-align: center; margin-top: 8px;">
        <h2 class="text-lg font-medium">
            <?= $judul; ?>
        </h2>
    </div>
    <div style="display: flex; justify-content: center;">
        <div>
            <div>
                <table border="1" style="margin: 0 auto; width: 80%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Perangkat</th>
                            <th>Nama Perangkat</th>
                            <th>Merk</th>
                            <th>Serial Number</th>
                            <th>Lokasi Perangkat</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        //$read yang diambil dari control function index
                        foreach ($read->result_array() as $row) {
                            ?>
                            <tr>
                                <td class="w-40">
                                    <div class="flex">
                                        <?php echo $no ?>
                                    </div>
                                </td>
                                <td class="w-40 whitespace-nowrap">
                                    <div class="flex items-center justify-center capitalize">
                                        <?php echo $row['id_perangkat'] ?>
                                    </div>
                                </td>
                                <td class="w-40 whitespace-nowrap">
                                    <div class="flex items-center justify-center capitalize">
                                        <?php echo $row['nama_perangkat'] ?>
                                    </div>
                                </td>
                                <td class="w-40 whitespace-nowrap">
                                    <div class="flex items-center justify-center capitalize">
                                        <?php echo $row['merk'] ?>
                                    </div>
                                </td>
                                <td class="w-40 whitespace-wrap">
                                    <div class="flex items-center justify-center capitalize">
                                        <?php echo $row['lokasi_perangkat'] ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>