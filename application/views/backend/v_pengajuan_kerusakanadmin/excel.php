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
    header("Content-Disposition: attachment; filename=Data Pengajuan.xls");
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
                            <th>Kode Pengajuan</th>
                            <th>Kode User</th>
                            <th>Kode Perangkat</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Deskripsi Kerusakan</th>
                            <td>Status Pengajuan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        //$read yang diambil dari control function index
                        foreach ($read->result_array() as $row) {
                            ?>
                            <tr>
                                <td>
                                    <div style="text-align: center;">
                                        <?php echo $no ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php echo $row['id_pengajuan'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php echo $row['id_users'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php echo $row['id_perangkat'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php echo $row['tanggal_pengajuan'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php echo $row['deskripsi_kerusakan'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php echo $row['status_pengajuan'] ?>
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