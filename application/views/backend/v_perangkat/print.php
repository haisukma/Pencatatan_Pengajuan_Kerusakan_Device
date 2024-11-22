<style>
    h2 {
        padding-top: 60px;

    }

    th,
    td {
        white-space: nowrap;
        padding: 8px;
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
                    </tr>
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
                                <div class="flex items-center justify-center">
                                    <?php echo $row['id_perangkat'] ?>
                                </div>
                            </td>
                            <td class="w-40 whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <?php echo $row['nama_perangkat'] ?>
                                </div>
                            </td>
                            <td class="w-40 whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <?php echo $row['merk'] ?>
                                </div>
                            </td>
                            <td class="w-40 whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <?php echo $row['serial_number'] ?>
                                </div>
                            </td>
                            <td class="w-40 whitespace-wrap">
                                <div class="flex items-center justify-center">
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