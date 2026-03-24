<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class=" row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

      <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-bg-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>


    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">

            <form action="<?= URLROOT; ?>/SneakerController/create" method="post">

                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control" value="<?= $_POST['merk'] ?? ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input name="model" type="text" class="form-control" value="<?= $_POST['model'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" value="<?= $_POST['type'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" step="0.01" class="form-control" value="<?= $_POST['prijs'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control" value="<?= $_POST['materiaal'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gewicht (kg)</label>
                    <input name="gewicht" type="number" min="0" step="0.01" class="form-control" value="<?= $_POST['gewicht'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control" value="<?= $_POST['releasedatum'] ?? ''; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            <a href="<?= URLROOT; ?>/homepages/index" class="bi bi-arrow-left"></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>