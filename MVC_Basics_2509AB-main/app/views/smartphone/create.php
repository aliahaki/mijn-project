<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
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

            <form action="<?= URLROOT; ?>/SmartphoneController/create" method="post">

                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>"
                        id="merk"
                        value="<?= $_POST['merk'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['merk'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>"
                        id="model"
                        value="<?= $_POST['model'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['model'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>"
                        id="prijs"
                        value="<?= $_POST['prijs'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['prijs'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="geheugen" class="form-label">Geheugen (GB)</label>
                    <input name="geheugen" type="number"
                        class="form-control <?= isset($data['errors']['geheugen']) ? 'is-invalid' : ''; ?>"
                        id="geheugen"
                        value="<?= $_POST['geheugen'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['geheugen'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="besturingssysteem" class="form-label">Besturingssysteem</label>
                    <input name="besturingssysteem" type="text"
                        class="form-control <?= isset($data['errors']['besturingssysteem']) ? 'is-invalid' : ''; ?>"
                        id="besturingssysteem"
                        value="<?= $_POST['besturingssysteem'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['besturingssysteem'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="schermgrootte" class="form-label">Schermgrootte</label>
                    <input name="schermgrootte" type="number"
                        class="form-control <?= isset($data['errors']['schermgrootte']) ? 'is-invalid' : ''; ?>"
                        id="schermgrootte"
                        value="<?= $_POST['schermgrootte'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['schermgrootte'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        id="releasedatum"
                        value="<?= $_POST['releasedatum'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['releasedatum'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="megapixels" class="form-label">Megapixels</label>
                    <input name="megapixels" type="number"
                        class="form-control <?= isset($data['errors']['megapixels']) ? 'is-invalid' : ''; ?>"
                        id="megapixels"
                        value="<?= $_POST['megapixels'] ?? '' ?>">
                    <div class="invalid-feedback"><?= $data['errors']['megapixels'] ?? '' ?></div>
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