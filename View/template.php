<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <base href="<?= $root ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="Content/CSS/style.css">
	    <?php if ($style) : ?>
            <link rel="stylesheet" href="<?= $style ?>">
	    <?php endif ?>
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <div class="title">
                    <h1><?= $headerTitle ?></h1>
                </div>
            </header>
            <div id="content">
                <?= $content ?>
            </div> <!-- #contenu -->
            <footer>

            </footer>
        </div> <!-- #global -->
        <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
