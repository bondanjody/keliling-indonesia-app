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
                    
                </div>
    </div>

<?= $this->endSection(); ?>