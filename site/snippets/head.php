<!DOCTYPE html>
<html lang="<?= $kirby->language() ? $kirby->language()->code() : 'en' ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta name="robots" content="index,follow" />
  <title><?= $page->title() ?></title>
  <?php /*
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#4d6173">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#4d6173">
  */ ?>
  <?= snippet('seo/meta') ?>
  <?= snippet('seo/favicon') ?>
  <style><?php echo(new Asset('assets/css/tailwind.css'))->read() ?></style>
</head>
<body class="<?= $bodyclasses ?? '' ?>">