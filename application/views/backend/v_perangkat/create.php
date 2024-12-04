<!-- BEGIN: Content -->
<div class="content">
    <div class="intro-y flex items-center mt-3">
        <div class="text-primary font-semibold text-3xl mr-auto">
            Tambah Data Perangkat
        </div>
    </div>
    <div class="grid grid-cols-16 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form class="" action="<?php echo site_url('Perangkat/save') ?>" method="post">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Kode Perangkat</label>
                        <input id="crud-form-1" type="number" name="id_perangkat" class="form-control w-full"
                            placeholder="20xxx" required autocomplete="off">
                        <?php if (isset($kode_error) && $kode_error): ?>
                            <div class="text-danger mt-2">
                                Kode Perangkat sudah digunakan, harap pilih Kode Perangkat lain.
                            </div>
                        <?php endif; ?>
                        </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Nama Perangkat</label>
                        <input id="crud-form-1" type="text" name="nama_perangkat" class="form-control w-full"
                            placeholder="PC" required autocomplete="off">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Merk</label>
                        <input id="crud-form-1" type="text" name="merk" class="form-control w-full"
                            placeholder="Acer" required autocomplete="off">
                    </div>
                    <!-- <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Serial Number</label>
                        <input id="crud-form-1" type="text" name="serial_number" class="form-control w-full"
                            placeholder="A0065i" required autocomplete="off">
                    </div> -->
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Lokasi Perangkat</label>
                        <input id="crud-form-1" type="text" name="lokasi_perangkat" class="form-control w-full"
                            placeholder="RuanganIPDS" required autocomplete="off">
                    </div>
                    <div class="text-right mt-5">
                        <a href="<?php echo site_url('Perangkat') ?>"><button type="button"
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