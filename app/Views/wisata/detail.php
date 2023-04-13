<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

    <div class="populer">
            <h1><?= $wisata['namatempat'] ?></h1>
            <div class="detail-image">
                <img src="/images/<?= $wisata['gambar'] ?>" style="width:100%; height:520px" alt="<?= $wisata['gambar'] ?>" />
            </div>
            <div class="content-description">

                    <div class="alamat">
                        <div class="alamat-header">
                            <h4>Alamat</h4>
                        </div>
                        <div class="alamat-description">
                            <iframe class="alamat-iframe" src="<?= $wisata['alamat'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="tentang">
                        <div class="tentang-header">
                            <h4>Tentang</h4>
                        </div>
                        <div class="tentang-description">
                            <p><?= $wisata['tentang'] ?></p>
                        </div>
                        
                    </div>
                    <div class="harga">
                        <div class="harga-header">
                            <h4>Harga tiket masuk</h4>
                        </div>
                        <div class="harga-description">
                            <p><?= $wisata['harga'] ?></p>
                        </div>
                    </div>
                    <div class="harga">
                        <div class="harga-description">
                            <form action="/wisata/<?= $wisata['id'] ?>" method="post">
                            <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="button-control delete" onclick="return confirm('Apakah anda yakin untuk menghapus item ini ?');">Delete</button>
                                <button href="#" class="button-control edit" disabled>Edit</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
    </div>

<?= $this->endSection(); ?>