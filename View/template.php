<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <base href="<?= $root ?>">
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
    </body>
</html>
