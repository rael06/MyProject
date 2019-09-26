<section id="home">
    <form action="" method="post" id="cantonForm"></form>

    <div class="cantonSelection">
        <label for="selectedCanton">Choix du canton :
            <select form="cantonForm" name="selectedCantonId" id="selectedCanton">
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
        <button form="cantonForm" name="confirm" value=true>Valider</button>
        <button form="cantonForm" name="exportCSV" value=true>Exporter CSV</button>
    </div>
</section>
