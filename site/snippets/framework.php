<!DOCTYPE html>
<html lang="<?= $kirby->language() ? $kirby->language()->code() : 'en' ?>">
    
    <?php 
        $themeColor = '';
        $maskIconColor = '';
    ?>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <?= snippet('seo/meta') ?>
        <?= snippet('seo/favicon', [
            'themeColor' => $themeColor,
            'maskIconColor' => $maskIconColor,
        ]) ?>
        <?= css('assets/css/tailwind.css') ?>
        <?= snippet('matomo') ?>
    </head>

    <body class="<?= " " . $bodyclasses ?? '' ?>">

        <?php /* HEADER */ ?>
        <header class="">
            <?= snippet('comps/header') ?>
        </header>

        <?php /* PAGE CONTENT */ ?>
        <main class="">
            <?= $slot ?>
        </main>

        <?php /* FOOTER */ ?>
        <footer class="">
            <?= snippet('comps/footer') ?>
        </footer>

        <?php /* Load libs config from site/config/config.php */
            $libs = option('libs'); 
        ?>
        <?php /* Alpine */
            if ($libs['alpine'] && $libs['alpine']['enabled'] === true) {

                $alpine = [];
                
                if ($libs['alpine']['mask'] === true)       $alpine[] = '/assets/js/alpine/mask.min.js';
                if ($libs['alpine']['intersect'] === true)  $alpine[] = '/assets/js/alpine/intersect.min.js';
                if ($libs['alpine']['persist'] === true)    $alpine[] = '/assets/js/alpine/persist.min.js';
                if ($libs['alpine']['focus'] === true)      $alpine[] = '/assets/js/alpine/focus.min.js';
                if ($libs['alpine']['collapse'] === true)   $alpine[] = '/assets/js/alpine/collapse.min.js';

                $alpine[] = "/assets/js/alpine/core.min.js";  // Must be imported last
                
                echo(js($alpine, [ 'defer' => true ]));
            }
        ?>
        <?php /* Smoothscroll polyfill */
            if ($libs['smoothscroll'] && $libs['smoothscroll']['enabled'] === true) {

                echo(js('/assets/js/smoothscroll/v0.4.4.min.js', [ 'defer' => true  ]));
            }
        ?>

    </body>
</html>