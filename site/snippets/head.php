<!DOCTYPE html>
<html lang="<?= $kirby->language() ? $kirby->language()->code() : 'en' ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <?= snippet('seo/meta') ?>
  <?= snippet('seo/favicon', [
    'themeColor' => '',
    'maskIconColor' => '',
  ]) ?>
  <?php 
    if ($libs['flickity'] && $libs['flickity']['enabled'] === true)
      echo(css('assets/css/flickity/core.min.css'));
  ?>
  <?= css('assets/css/tailwind.css') ?>
</head>
<body class="<?= $bodyclasses ?? '' ?>">