<?php

Kirby::plugin('philipptrenz/cachebuster', [
  'options' => [
    'active' => true
  ],
  'components' => [
    'css' => function ($kirby, $url, $options) {
      if($kirby->option('philipptrenz.cachebuster.active') === true) {
        $file = $kirby->roots()->index() . '/' . $url;
        return $url . '?' . F::modified($file);
      } else {
        return $url;
      }
    },
    'js' => function ($kirby, $url, $options) {
      if($kirby->option('philipptrenz.cachebuster.active') === true) {
        $file = $kirby->roots()->index() . '/' . $url;
        return $url . '?' . F::modified($file);
      } else {
        return $url;
      }
    }
  ]
]);
