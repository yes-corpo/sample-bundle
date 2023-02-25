# Creating a Bundle

This section creates and enables a new bundle to show there are only a few steps required.
The new bundle is called AcmeTestBundle, where the ``Acme`` portion is an example
name that should be replaced by some "vendor" name that represents you or your
organization (e.g. AbcTestBundle for some company named ``Abc``).

A bundle is also a PHP namespace. The namespace must follow the `PSR-4`_
interoperability standard for PHP namespaces and class names: it starts with a
vendor segment, followed by zero or more category segments, and it ends with the
namespace short name, which must end with ``Bundle``.

A namespace becomes a bundle as soon as you add "a bundle class" to it (which is
a class that extends `Symfony\Component\HttpKernel\Bundle\Bundle`).
The bundle class name must follow these rules:

* Use only alphanumeric characters and underscores;
* Use a StudlyCaps name (i.e. camelCase with an uppercase first letter);
* Use a descriptive and short name (no more than two words);
* Prefix the name with the concatenation of the vendor (and optionally the
  category namespaces);
* Suffix the name with ``Bundle``.

Here are some valid bundle namespaces and class names:


| Namespace | Bundle Class Name |
|--|--|
| ``Acme\Bundle\BlogBundle`` | AcmeBlogBundle |
| ``Acme\BlogBundle`` | AcmeBlogBundle |

By convention, the ``getName()`` method of the bundle class should return the
class name.

    If you share your bundle publicly, you must use the bundle class name as
    the name of the repository (AcmeBlogBundle and not BlogBundle for instance).
----
    Symfony core Bundles do not prefix the Bundle class with ``Symfony``
    and always add a ``Bundle`` sub-namespace; for example:
    :class:`Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle`.

Each bundle has an alias, which is the lower-cased short version of the bundle
name using underscores (``acme_blog`` for AcmeBlogBundle). This alias
is used to enforce uniqueness within a project and for defining bundle's
configuration options (see below for some usage examples).

Start by adding creating a new class called ``AcmeTestBundle``:

``` php
// src/AcmeTestBundle.php
namespace Acme\TestBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class AcmeTestBundle extends AbstractBundle
{
}
```

## Composer

The composer.json file should include at least the following metadata:

``name``  
- Consists of the vendor and the short bundle name. If you are releasing the bundle on your own instead of on behalf of a company, use your personal name (e.g. `johnsmith/blog-bundle`). Exclude the vendor name from the bundle short name and separate each word with a hyphen. For example: AcmeBlogBundle is transformed into `blog-bundle` and AcmeSocialConnectBundle is transformed into `social-connect-bundle`.  

``description``  
- A brief explanation of the purpose of the bundle.  

``type``  
- Use the symfony-bundle value.  

``license``  
- a string (or array of strings) with a valid license identifier, such as `MIT`.  

``autoload``  
- This information is used by Symfony to load the classes of the bundle. It's recommended to use the PSR-4 autoload standard: use the namespace as key, and the location of the bundle's main class (relative to composer.json) as value. As the main class is located in the src/ directory of the bundle:  


``` json
{
    "autoload": {
        "psr-4": {
            "Acme\\BlogBundle\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Acme\\BlogBundle\\Tests\\": "tests/"
        }
    }
}
```

In order to make it easier for developers to find your bundle, register it on Packagist, the official repository for Composer packages.

## Directory Structure
The directory structure of a bundle is meant to help to keep code consistent between all Symfony bundles. It follows a set of conventions, but is flexible to be adjusted if needed:

`src/`
- Contains all PHP classes related to the bundle logic (e.g. Controller/RandomController.php).

`config/`
- Houses configuration, including routing configuration (e.g. routing.yaml).

`templates/`
- Holds templates organized by controller name (e.g. random/index.html.twig).

`translations/`
- Holds translations organized by domain and locale (e.g. AcmeTestBundle.en.xlf).

`public/`
- Contains web assets (images, stylesheets, etc) and is copied or symbolically linked into the project public/ directory via the assets:install console command.

`assets/`
- Contains JavaScript, CSS, images and other assets related to the bundle that are not in public/ (e.g. stimulus controllers)

`tests/`
- Holds all tests for the bundle.

The following is the recommended directory structure of an AcmeBlogBundle:
```
<your-bundle>/
├── config/
├── docs/
│   └─ index.md
├── public/
├── src/
│   ├── Controller/
│   ├── DependencyInjection/
│   └── AcmeBlogBundle.php
├── templates/
├── tests/
├── translations/
├── LICENSE
└── README.md
```

The following files are mandatory, because they ensure a structure convention that automated tools can rely on:

- `src/AcmeBlogBundle.php`: This is the class that transforms a plain directory into a Symfony bundle (change this to your bundle's name);

- `README.md`: This file contains the basic description of the bundle and it usually shows some basic examples and links to its full documentation (it can use any of the markup formats supported by GitHub, such as README.rst);

- `LICENSE`: The full contents of the license used by the code. Most third-party bundles are published under the MIT license, but you can choose any license;

- `docs/index.md`: The root file for the Bundle documentation.

The depth of subdirectories should be kept to a minimum for the most used classes and files. Two levels is the maximum.

The bundle directory is read-only. If you need to write temporary files, store them under the `cache/` or `log/` directory of the host application. Tools can generate files in the bundle directory structure, but only if the generated files are going to be part of the repository.

The following classes and files have specific emplacements (some are mandatory and others are just conventions followed by most developers):

| Type | Directory |
|--|--|
| Commands | `src/Command/` |
| Controllers | `src/Controller/` |
| Service Container Extensions | `src/DependencyInjection/` |
| Doctrine ORM entities | `src/Entity/` |
| Doctrine ODM documents | `src/Document/` |
| Event Listeners | `src/EventListener/` |
| Configuration (routes, services, etc.) | `config/` |
| Web Assets (CSS, JS, images) | `public/` |
| Translation files | `translations/` |
| Validation (when not using annotations) | `config/validation/` |
| Serialization (when not using annotations) | `config/serialization/` |
| Templates | `templates/` |
| Unit and Functional Tests | `tests/` |