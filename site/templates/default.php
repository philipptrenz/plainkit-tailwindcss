<html>
<head>
  <title><?= $site->title()->html() ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= snippet('seo/meta') ?>
  <?= snippet('seo/favicon') ?>
  <?= css('assets/css/tailwind.css') ?>
</head>
<body>

  <h1 class="p-4 text-center text-xl font-bold"><?= $page->title() ?></h1>

</body>
</html>