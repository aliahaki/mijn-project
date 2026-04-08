<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-10">
            <h2><?php echo $data['title']; ?></h2>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <p class="lead">
                Welkom bij MVC Basics. Selecteer een categorie in de navbar om de CRUD functionaliteit te bekijken.
            </p>
        </div>
    </div>

    <div class="row mt-4 d-flex justify-content-center homepage-links">
        <div class="col-10">

            <div class="row">
                <div class="col-6 mb-4 d-flex">
                    <div class="card flex-fill d-flex flex-column">
                        <div class="card-body flex-grow-1 text-center">
                            <h5 class="card-title"><i class="bi bi-phone"></i> Smartphones</h5>
                            <p class="card-text">
                                Beheer een overzicht van smartphones met merk, model, prijs en specificaties.
                            </p>
                        </div>
                        <div class="mt-auto text-center pb-3">
                            <a href="<?= URLROOT; ?>/SmartphoneController/index" class="btn btn-primary">
                                Bekijk Smartphones
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4 d-flex">
                    <div class="card flex-fill d-flex flex-column">
                        <div class="card-body flex-grow-1 text-center">
                            <h5 class="card-title"><i class="bi bi-shoe"></i> Sneakers</h5>
                            <p class="card-text">
                                Beheer een overzicht van sneakers met merk, model en type.
                            </p>
                        </div>
                        <div class="mt-auto text-center pb-3">
                            <a href="<?= URLROOT; ?>/SneakerController/index" class="btn btn-primary">
                                Bekijk Sneakers
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-4 d-flex">
                    <div class="card flex-fill d-flex flex-column">
                        <div class="card-body flex-grow-1 text-center">
                            <h5 class="card-title"><i class="bi bi-clock"></i> Horloges</h5>
                            <p class="card-text">
                                Beheer een overzicht van luxe horloges met merk, model, prijs en materiaal.
                            </p>
                        </div>
                        <div class="mt-auto text-center pb-3">
                            <a href="<?= URLROOT; ?>/HorlogeController/index" class="btn btn-primary">
                                Bekijk Horloges
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4 d-flex">
                    <div class="card flex-fill d-flex flex-column">
                        <div class="card-body flex-grow-1 text-center">
                            <h5 class="card-title"><i class="bi bi-music-note-beamed"></i> Zangeressen</h5>
                            <p class="card-text">
                                Beheer een overzicht van de rijkste zangeressen ter wereld.
                            </p>
                        </div>
                        <div class="mt-auto text-center pb-3">
                            <a href="<?= URLROOT; ?>/ZangeresController/index" class="btn btn-primary">
                                Bekijk Zangeressen
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>