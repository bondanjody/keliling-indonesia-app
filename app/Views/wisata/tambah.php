<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

    <div class="populer">
        <h1>Tambah Data</h1>
        <?php if(!empty($validation)) : ?>
            <div class="notif-error">
                <?= $validation ?>
            </div>
        <?php endif; ?>
        <form action="/wisata/save" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
                <table class="contributor-container" style="width: 50%; margin:auto;" >
                    <tr>
                        <td>
                            <label for="namatempat" style="font-size: small;color:#555">Nama tempat</label><br>
                            <input type="text" name="namatempat" id="namatempat" style="width:100%; height:2rem; padding:0.3rem" value="<?= old('namatempat'); ?>" autofocus required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tentang" style="font-size: small;color:#555">Tentang</label><br>
                            <textarea type="text" name="tentang" id="tentang" style="width:100%; height:3rem; padding:0.3rem" required><?= old('tentang'); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="harga" style="font-size: small;color:#555">Harga</label><br>
                            <input type="text" name="harga" id="harga" style="width:100%; height:2rem; padding:0.3rem" value="<?= old('harga'); ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="provinsi" style="font-size: small;color:#555">Provinsi</label><br>
                            <input type="text" name="provinsi" id="provinsi" style="width:100%; height:2rem; padding:0.3rem" value="<?= old('provinsi'); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="alamat" style="font-size: small;color:#555" required>Alamat (Google Maps API)</label><br>
                            <textarea name="alamat" id="alamat" style="width:100%; height:3rem; padding:0.3rem" required><?= old('alamat'); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gambar" class="label-gambar" style="font-size: small;color:#555">Gambar</label><br>
                            <div>
                                <img src="images/default.jpg" class="preview-gambar" />
                            </div>
                            <input type="file" name="gambar" id="gambar" style="width:100%; height:2rem; padding:0.3rem" onchange="previewImage()" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="submit-button">Kirim</button>
                        </td>
                    </tr>
                </table>
            </form> 
    </div>

<?= $this->endSection(); ?>