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
        <div class="col-6">

            <form action="<?= URLROOT; ?>/SneakerController/update/<?= $data['sneaker']->Id ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input name="merk" type="text"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['merk'] ?? $data['sneaker']->Merk; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['merk'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input name="model" type="text"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['model'] ?? $data['sneaker']->Model; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['model'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input name="type" type="text"
                        class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['type'] ?? $data['sneaker']->Type; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['type'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prijs</label>
                    <input name="prijs" type="number"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['prijs'] ?? $data['sneaker']->Prijs; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['prijs'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Materiaal</label>
                    <input name="materiaal" type="text"
                        class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['materiaal'] ?? $data['sneaker']->Materiaal; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['materiaal'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gewicht (kg)</label>
                    <input name="gewicht" type="number"
                        class="form-control <?= isset($data['errors']['gewicht']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['gewicht'] ?? $data['sneaker']->Gewicht; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['gewicht'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['releasedatum'] ?? $data['sneaker']->Releasedatum; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['releasedatum'] ?? '' ?></div>
                </div>

                <input type="hidden" name="id" value="<?= $data['sneaker']->Id ?>">

                <button type="submit" class="btn btn-primary">Opslaan</button>

            </form>

            <a href="<?= URLROOT; ?>/homepages/index" class="bi bi-arrow-left"></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>