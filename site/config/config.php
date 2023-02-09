<?php

return [
    'languages' => false,
    'languages.detect' => true,
    'debug' => false,
    'updates' => [
      'plugins' => [
          'sylvainjule/matomo'  => false,
          'bnomei/robots-txt' => false,
          'philipptrenz/kirby3-seo'  => false,
      ]
    ],
    'routes' => [
      [
      'pattern' => 'sitemap.xml',
      'action'  => function() {
          $pages = site()->pages()->index();

          // fetch the pages to ignore from the config settings,
          // if nothing is set, we ignore the error page
          $ignore = kirby()->option('sitemap.ignore', ['error']);

          $content = snippet('sitemap', compact('pages', 'ignore'), true);

          // return response with correct header type
          return new Kirby\Cms\Response($content, 'application/xml');
        }
      ],
      [
        'pattern' => 'sitemap',
        'action'  => function() {
          return go('sitemap.xml', 301);
        }
      ]
    ],
    'bnomei.robots-txt' => [
      'sitemap' => 'sitemap.xml',
      'groups' => function() {
        if (site()->globalNoIndex()->toBool()) {
          return [
            '*' => [
              'disallow' => [
                '/',
              ]
            ]
          ];
        } else {
          return [
            '*' => [ // user-agent
              'disallow' => [
                  '/kirby/',
                  '/site/',
                  '/storage/',
              ],
              'allow' => [
                  '/media/',
              ]
            ]
          ];
        }
      },
    ],
];