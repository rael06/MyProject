<section id="result">
    <form action="" method="post" id="resultForm"></form>
    <div class="info">
        <h3>Infos générales</h3>
        <table>
            <tr>
                <th>Inscrits</th>
                <th>Votes</th>
                <th>Abstention</th>
            </tr>
            <tr>
                <td><?= $canton->getInscrits() ?></td>
                <td><?= $nbVote ?></td>
                <td><?= number_format(($canton->getInscrits() - $nbVote) * 100 / $canton->getInscrits(), 2) ?> %</td>
            </tr>
        </table>
    </div>
    <div class="ranking">
        <h3>Classement</h3>
        <table>
			<?php foreach ($votes as $vote) : ?>
                <tr>
                    <td><?= $vote->nom ?></td>
                    <td>
                        <?= $vote->votes ?> (<strong><?= number_format((intval($vote->votes)) * 100 / $nbVote, 3) ?> %</strong>)
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?= number_format((intval($vote->votes)) * 100 / $nbVote, 2) ?>%">
                            </div>
                        </div>
                    </td>
                </tr>
			<?php endforeach; ?>
        </table>
    </div>
    <div class="buttons">
        <button form="resultForm" name="back" class="btn btn-primary" value=true>Retour</button>
    </div>
</section>
