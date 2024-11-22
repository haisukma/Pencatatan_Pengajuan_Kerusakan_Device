<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-3">
        <div class="text-primary font-semibold text-3xl mr-auto">
            Tambah Data Pengajuan Perangkat
        </div>
    </div>
    <div class="grid grid-cols-16 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form class="" action="<?php echo site_url('Pengajuan_Kersuakan/save') ?>" method="post">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Kode Pengajuan</label>
                        <input id="crud-form-1" type="text" name="id_pengajuan" class="form-control w-full"
                            placeholder="A0xxx" required autocomplete="off">
                        <?php if (isset($kode_error) && $kode_error): ?>
                            <div class="text-danger mt-2">
                                Kode Pengajuan sudah digunakan, harap pilih Kode Pengajuan lain.
                            </div>
                        <?php endif; ?>
                        </div>
                     <div>
                        <label for="crud-form-1" class="form-label">Kode User</label>
                        <select name="id_users" class="form-control" required>
                        <option value=0 selected>- Pilih Kode User -</option>
                            <?php
                            foreach ($getuser->result_array() as $r) {
                                ?>
                                <option value="<?php echo $r['id_users'], ' | ', $r['username'] ?>"><?php echo
                                         $r['id_users'], ' | ', $r['username']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Kode Perangkat</label>
                        <select name="id_perangkat" class="form-control" required>
                            <option value=0 selected>- Pilih Kode Perangkat -</option>
                            <?php
                            foreach ($getperangkat->result_array() as $r) {
                                ?>
                                <option value="<?php echo $r['id_perangkat'], ' | ', $r['nama_perangkat'] ?>"><?php echo
                                         $r['id_perangkat'], ' | ', $r['nama_perangkat']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Tanggal Pengajuan</label>
                        <input id="crud-form-1" type="date" name="tanggal_pengajuan" class="form-control w-full"
                            placeholder="PC" required autocomplete="off">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Deskripsi Kerusakan</label>
                        <input id="crud-form-1" type="text" name="deskripsi_kerusakan" class="form-control w-full"
                            placeholder="Acer" required autocomplete="off">
                    </div>
                    <div class="mt-3">
                    ,div class="mt-3">
                        <label for="crud-form-2" class="form-label">Status Pengajuan</label>
                        <select data-placeholder="status_pengajuan" name="status_pengajuan" class="tom-select w-full capitalize"
                            id="crud-form-2">
                            <option value="<?php echo $edit['status_pengajuan'] ?>"><?php echo $edit['status_pengajuan'] ?></option>
                            <option value="baru">Baru Diajukan</option>
                            <option value="sedang diproses">Sedang Diproses</option>
                            <option value="selesai">Selesai</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="<?php echo site_url('Pengajuan_Perangkat') ?>"><button type="button"
                                class="btn btn-danger w-24 mr-1">Cancel</button></a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>
<!-- END: Content -->