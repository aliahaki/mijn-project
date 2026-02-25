<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Vermogen (€)</th>
                        <th>Nationaliteit</th>
                        <th>Leeftijd</th>
                        <th>Genre</th>
                        <th>Hit Song</th>
                        <th>Releasedatum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['result'] as $zangeres) : ?>
                        <tr>
                            <td><?= $zangeres->Naam; ?></td>
                            <td><?= number_format($zangeres->Vermogen, 0, ',', '.'); ?></td>
                            <td><?= $zangeres->Nationaliteit; ?></td>
                            <td><?= $zangeres->Leeftijd; ?></td>
                            <td><?= $zangeres->Genre; ?></td>
                            <td><?= $zangeres->HitSong; ?></td>
                            <td><?= $zangeres->Releasedatum; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>