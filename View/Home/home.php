<section id="home">
    <form action="" method="post" id="cantonForm"></form>

    <div class="cantonSelection form-group">
        <label for="selectedCanton"><strong>Choix du canton :</strong>
            <select form="cantonForm" class="form-control" name="selectedCantonId" id="selectedCanton">
				<?php foreach ($cantons as $canton) : ?>
                    <option value="<?= $canton->getId() ?>"
						<?= $session->existsAttribute('selectedCantonId') &&
						    $session->getAttribute('selectedCantonId') === $canton->getId() ?
							"selected" : null ?>>
						<?= $canton->getCode() ?> - <?= $canton->getNom() ?></option>
				<?php endforeach; ?>
            </select>
        </label>
    </div>

    <div class="buttons">
        <button form="cantonForm" name="confirm" class="btn btn-primary" value=true>Valider</button>
        <button form="cantonForm" name="exportCSV" class="btn btn-primary" value=true>Exporter CSV</button>
    </div>
</section>
