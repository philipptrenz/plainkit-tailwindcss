<!DOCTYPE html>
<html lang="<?= $kirby->language() ? $kirby->language()->code() : 'en' ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta name="robots" content="index,follow" />
  <title><?= $page->title() ?></title>
  <?php /*
  <link rel="manifest" href="/assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#4d6173">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#4d6173">
  */ ?>
  <?= snippet('seo/meta') ?>
  <?= snippet('seo/favicon', [
    'themeColor' => '',
    'maskIconColor' => '',
  ]) ?>
  <style><?php echo(new Asset('assets/css/tailwind.css'))->read() ?></style>
</head>
<body class="<?= $bodyclasses ?? '' ?>">