<?php 
  $libs = [
    'flickity' => [
      'enabled' => true
    ],
    'alpine' => [
      'enabled' => false,
      'mask' => false,
      'intersect' => false,
      'persist' => false,
      'focus' => false,
      'collapse' => false,  
    ],
    'smooth-scroll' => [
      'enabled' => false
    ],
  ];
?>
<?php snippet('head', [ 'bodyclasses' => 'p-6', 'libs' => $libs ]); ?>

<h1 class="font-bold text-2xl text-center"><?= $page->title() ?></h1>
<p class=""><?= $page->text() ?></p>

<?php snippet('foot', [ 'libs' => $libs ]); ?>