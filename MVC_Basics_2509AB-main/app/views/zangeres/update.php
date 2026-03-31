<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?= $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-primary" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-md-6">

            <form action="<?= URLROOT; ?>/ZangeresController/update/<?= $data['zangeres']->Id ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Naam</label>
                    <input name="naam" type="text"
                        class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['naam'] ?? $data['zangeres']->Naam ?>">
                    <div class="invalid-feedback"><?= $data['errors']['naam'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vermogen (€)</label>
                    <input name="vermogen" type="number"
                        class="form-control <?= isset($data['errors']['vermogen']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['vermogen'] ?? $data['zangeres']->Vermogen ?>">
                    <div class="invalid-feedback"><?= $data['errors']['vermogen'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nationaliteit</label>
                    <input name="nationaliteit" type="text"
                        class="form-control <?= isset($data['errors']['nationaliteit']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['nationaliteit'] ?? $data['zangeres']->Nationaliteit ?>">
                    <div class="invalid-feedback"><?= $data['errors']['nationaliteit'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number"
                        class="form-control <?= isset($data['errors']['leeftijd']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['leeftijd'] ?? $data['zangeres']->Leeftijd ?>">
                    <div class="invalid-feedback"><?= $data['errors']['leeftijd'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <input name="genre" type="text"
                        class="form-control <?= isset($data['errors']['genre']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['genre'] ?? $data['zangeres']->Genre ?>">
                    <div class="invalid-feedback"><?= $data['errors']['genre'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hit Song</label>
                    <input name="hitsong" type="text"
                        class="form-control <?= isset($data['errors']['hitsong']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['hitsong'] ?? $data['zangeres']->HitSong ?>">
                    <div class="invalid-feedback"><?= $data['errors']['hitsong'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['releasedatum'] ?? $data['zangeres']->Releasedatum ?>">
                    <div class="invalid-feedback"><?= $data['errors']['releasedatum'] ?? '' ?></div>
                </div>

                <input type="hidden" name="id" value="<?= $data['zangeres']->Id ?>">

                <button type="submit" class="btn btn-primary">Opslaan</button>

            </form>

            <a href="<?= URLROOT; ?>/homepages/index" class="bi bi-arrow-left"></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>