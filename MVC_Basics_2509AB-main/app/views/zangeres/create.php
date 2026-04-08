<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h3 class="text-success"><?= $data['title']; ?></h3>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-primary" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-md-6">

            <form action="<?= URLROOT; ?>/ZangeresController/create" method="post">

                <div class="mb-3">
                    <label class="form-label">Naam</label>
                    <input name="naam" type="text"
                        class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['naam'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['naam'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vermogen (€)</label>
                    <input name="vermogen" type="number"
                        class="form-control <?= isset($data['errors']['vermogen']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['vermogen'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['vermogen'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nationaliteit</label>
                    <input name="nationaliteit" type="text"
                        class="form-control <?= isset($data['errors']['nationaliteit']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['nationaliteit'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['nationaliteit'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number"
                        class="form-control <?= isset($data['errors']['leeftijd']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['leeftijd'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['leeftijd'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <input name="genre" type="text"
                        class="form-control <?= isset($data['errors']['genre']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['genre'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['genre'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hit Song</label>
                    <input name="hitsong" type="text"
                        class="form-control <?= isset($data['errors']['hitsong']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['hitsong'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['hitsong'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['releasedatum'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['releasedatum'] ?? '' ?></div>
                </div>

                <div class="d-flex justify-content-between mt-3 mb-5">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                    <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Terug naar homepage
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>