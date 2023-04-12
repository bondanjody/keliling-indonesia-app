<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

    <div class="populer">
            <h1>Daftar Wisata</h1>
            <div class="populer-container">
                <?php foreach($wisata as $w) : ?>
                    <a href="/wisata/<?= $w['slug'] ?>"><div class="populer-content">
                        <div class="populer-content-picture" style="background-image: url('/images/<?= $w['gambar'] ?>');background-size:cover;"></div>
                        <p class="card-keterangan"><?= $w['namatempat'] ?></p>
                    </div></a>
                <?php endforeach; ?>        
            </div>
        </div>

<?= $this->endSection(); ?>