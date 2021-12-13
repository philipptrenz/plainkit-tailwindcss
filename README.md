# Kirby Plainkit + Tailwind = 🤍

This Repository extends the Kirby Plainkit by adding the following features:

- Define your CSS with [Utility-First](https://tailwindcss.com/docs/utility-first) using [Tailwind CSS](https://tailwindcss.com/)
- Includes hot reloading using PostCSS and Gulp
- Kirby is added as a submodule for easy updates
- Also the sitemap.xml is already included

### Try Kirby for free  
You can try Kirby and the Plainkit on your local machine or on a test server as long as you need to make sure it is the right tool for your next project. … and when you’re convinced, [buy your license](https://getkirby.com/buy).

### Get going
Getting started is as easy as the following:

```bash
# Initially pull Kirby as a submodule
git submodule update --init --recursive

# Install JavaScript dependencies
yarn install

# Start PHP server with Browser hot reloading
yarn dev

# Build CSS files for production
yarn build
```

For updating Kirby to the latest version, just hit:

```bash
./update.sh
```

For getting started with Kirby, read the awesome guide on [how to get started with Kirby](https://getkirby.com/docs/guide/quickstart).


## HashandSalts SEO plugin

See: https://github.com/HashandSalt/kirby3-seo

After installing the plugin, setup controllers to bring in the shared SEO controller into each of your template
controllers.

The bare minimum controller looks like this:

```
<?php

return function ($page, $kirby, $site) {

  // SEO
  $seo = $kirby->controller('seo' , compact('page', 'site', 'kirby'));

  return $seo;

};
```

To override any of the values, you can do this inside your controller. For example, to change the format of the meta title, you could do this:

```
<?php

return function ($page, $kirby, $site) {

  // Meta
  $seo = $kirby->controller('seo' , compact('page', 'site', 'kirby'));

  // Override Meta Title
  $metatitle = $page->seotitle().' | '.$site->title();

  $data = compact('metatitle');

  return a::merge($seo, $data);

};

```

Additionally, you need to populate the pages with information that is needed for the meta tags to be filled out correctly. The plugin contains blueprints for this and are meant to be used as tabs in your pages:

```
title:     Default

tabs:

  # SEO META
  meta: tabs/seo/meta

```

In the `site.yml` also setup the contact tab which will capture social media account information.

```
title:     Site

tabs:

  # Contact
  contact: tabs/seo/contact
```

Finally, output the meta tags in your templates with the following snippet.

```
<?= snippet('seo/meta') ?>
```

For convenience the plugin also contains a favicon snippet:

```
<?= snippet('seo/favicon') ?>
```

You can generate the favicons at [this website link](https://realfavicongenerator.net/)

## What's Kirby?
- **[getkirby.com](https://getkirby.com)** – Get to know the CMS.
- **[Try it](https://getkirby.com/try)** – Take a test ride with our online demo. Or download one of our kits to get started.
- **[Documentation](https://getkirby.com/docs/guide)** – Read the official guide, reference and cookbook recipes.
- **[Issues](https://github.com/getkirby/kirby/issues)** – Report bugs and other problems.
- **[Feedback](https://feedback.getkirby.com)** – You have an idea for Kirby? Share it.
- **[Forum](https://forum.getkirby.com)** – Whenever you get stuck, don't hesitate to reach out for questions and support.
- **[Discord](https://chat.getkirby.com)** – Hang out and meet the community.
- **[Twitter](https://twitter.com/getkirby)** – Spread the word.
- **[Instagram](https://www.instagram.com/getkirby/)** – Share your creations: #madewithkirby.

---

© 2009-2020 Bastian Allgeier (Bastian Allgeier GmbH)  
[getkirby.com](https://getkirby.com) · [License agreement](https://getkirby.com/license)
