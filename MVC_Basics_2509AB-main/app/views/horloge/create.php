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

            <form action="<?= URLROOT; ?>/HorlogeController/create" method="post">

                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>"
                        id="merk"
                        value="<?= $_POST['merk'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['merk'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>"
                        id="model"
                        value="<?= $_POST['model'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['model'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs (€)</label>
                    <input name="prijs" type="number"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>"
                        id="prijs"
                        value="<?= $_POST['prijs'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['prijs'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text"
                        class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>"
                        id="materiaal"
                        value="<?= $_POST['materiaal'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['materiaal'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="gewicht" class="form-label">Gewicht (kg)</label>
                    <input name="gewicht" type="number"
                        class="form-control <?= isset($data['errors']['gewicht']) ? 'is-invalid' : ''; ?>"
                        id="gewicht"
                        value="<?= $_POST['gewicht'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['gewicht'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        id="releasedatum"
                        value="<?= $_POST['releasedatum'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['releasedatum'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="waterdichtheid" class="form-label">Waterdichtheid (m)</label>
                    <input name="waterdichtheid" type="number"
                        class="form-control <?= isset($data['errors']['waterdichtheid']) ? 'is-invalid' : ''; ?>"
                        id="waterdichtheid"
                        value="<?= $_POST['waterdichtheid'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['waterdichtheid'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text"
                        class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>"
                        id="type"
                        value="<?= $_POST['type'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['type'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label for="uniekkenmerk" class="form-label">Uniek Kenmerk</label>
                    <input name="uniekkenmerk" type="text"
                        class="form-control <?= isset($data['errors']['uniekkenmerk']) ? 'is-invalid' : ''; ?>"
                        id="uniekkenmerk"
                        value="<?= $_POST['uniekkenmerk'] ?? ''; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['uniekkenmerk'] ?? '' ?></div>
                </div>

                <button type="submit" class="btn btn-primary">Opslaan</button>

            </form>

            <a href="<?= URLROOT; ?>/homepages/index" class="bi bi-arrow-left"></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>