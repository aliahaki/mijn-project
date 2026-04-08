<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-primary" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">

            <form action="<?= URLROOT; ?>/SneakerController/create" method="post">

                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input name="merk" type="text"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['merk'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['merk'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input name="model" type="text"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['model'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['model'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input name="type" type="text"
                        class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['type'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['type'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prijs</label>
                    <input name="prijs" type="number"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['prijs'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['prijs'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Materiaal</label>
                    <input name="materiaal" type="text"
                        class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['materiaal'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['materiaal'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gewicht (kg)</label>
                    <input name="gewicht" type="number"
                        class="form-control <?= isset($data['errors']['gewicht']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['gewicht'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['gewicht'] ?? '' ?></div>
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