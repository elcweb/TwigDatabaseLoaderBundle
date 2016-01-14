TwigDatabaseLoaderBundle
===================

[![Latest Stable Version](https://poser.pugx.org/elcweb/twigdatabaseloader-bundle/v/stable.png)](https://packagist.org/packages/elcweb/twigdatabaseloader-bundle)
[![Total Downloads](https://poser.pugx.org/elcweb/twigdatabaseloader-bundle/downloads.png)](https://packagist.org/packages/elcweb/twigdatabaseloader-bundle)

Installation
------------

### Step 1: Download using composer

```js
{
    "require": {
        "elcweb/twigdatabaseloader-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update elcweb/twigdatabaseloader-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Elcweb\TwigDatabaseLoaderBundle\TwigDatabaseLoaderBundle(),
    );
}
```

Usage
-----
Populate the table Template with your templates, they will be loaded before the filesystem.

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/elcweb/TwigDatabaseLoaderBundle/issues).

When reporting a bug, it may be a good idea to reproduce it in a basic project
built using the [Symfony Standard Edition](https://github.com/symfony/symfony-standard)
to allow developers of the bundle to reproduce the issue by simply cloning it
and following some steps.
