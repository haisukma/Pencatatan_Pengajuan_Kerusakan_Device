<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-3">
        <div class="text-primary font-semibold text-3xl mr-auto">
            Tambah Data Pengajuan Kerusakan
        </div>
    </div>
    <div class="grid grid-cols-16 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form class="" action="<?php echo site_url('Pengajuan_KerusakanAdmin/save') ?>" method="post">
                <div class="intro-y box p-5">
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Perangkat</label>
                        <select data-placeholder="Pilih Perangkat" name="id_perangkat"
                            class="tom-select w-full capitalize" id="crud-form-2">
                            <?php
                            foreach ($getperangkat->result_array() as $r) {
                                ?>
                                <option value="<?php echo $r['id_perangkat'], $r['merk'] ?>"><?php echo
                                        $r['id_perangkat'], ' | ', $r['merk']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Deskripsi Kerusakan</label>
                        <input id="crud-form-1" type="text" name="deskripsi_kerusakan" class="form-control w-full"
                            placeholder="Freeze" required autocomplete="off">
                    </div>
                    <div class="mt-3">
                    <div class="text-right mt-5">
                        <a href="<?php echo site_url('Pengajuan_KerusakanAdmin') ?>"><button type="button"
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