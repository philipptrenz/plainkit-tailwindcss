  <?php 
    if ($libs['flickity'] && $libs['flickity']['enabled'] === true) {
      echo(js('/assets/js/flickity/core.min.js', [ 'defer' => true ]));
    }

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

    if ($libs['smooth-scroll'] && $libs['smooth-scroll']['enabled'] === true) {
      echo(js('/assets/js/smooth-scroll/init.js', [ 'defer' => true  ]));
      echo(js('/assets/js/smooth-scroll/core.min.js', [ 'async' => true, 'id' => 'smooth-scroll' ]));
    }
  ?>

</body>
</html>
