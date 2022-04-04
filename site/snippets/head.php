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
  <style><?php echo(new Asset('assets/css/tailwind.css'))->read() ?></style>
</head>
<body class="<?= $bodyclasses ?? '' ?>">