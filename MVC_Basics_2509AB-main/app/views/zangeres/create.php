<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h3 class="text-success"><?php echo $data['title']; ?></h3>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-md-6">
            <?php if (!empty($data['message'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $data['message']; ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-md-6">

            <form action="<?= URLROOT; ?>/ZangeresController/create" method="post">

                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control" id="naam" value="<?= $_POST['naam'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="vermogen" class="form-label">Vermogen (€)</label>
                    <input name="vermogen" type="number" min="0" max="1000000000" step="0.01" class="form-control" id="vermogen" value="<?= $_POST['vermogen'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nationaliteit" class="form-label">Nationaliteit</label>
                    <input name="nationaliteit" type="text" class="form-control" id="nationaliteit" value="<?= $_POST['nationaliteit'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="leeftijd" class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number" min="1" max="120" class="form-control" id="leeftijd" value="<?= $_POST['leeftijd'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input name="genre" type="text" class="form-control" id="genre" value="<?= $_POST['genre'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="hitsong" class="form-label">Hit Song</label>
                    <input name="hitsong" type="text" class="form-control" id="hitsong" value="<?= $_POST['hitsong'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control" id="releasedatum" value="<?= $_POST['releasedatum'] ?? ''; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index" class="bi bi-arrow-left"></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>