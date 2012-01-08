BlageConnectBundle [![Build Status](https://secure.travis-ci.org/digitalkaoz/BlageConnectBundle.png)](http://travis-ci.org/digitalkaoz/BlageConnectBundle)
==================

A Bundle to interact with the [Sensio Connect](https://connect.sensiolabs.com/) API.

#Installation#

##via `deps.ini`#

Inlcude the Bundle in your deps File

    [BlageConnectBundle]
      git=git://github.com/monofone/BlageConnectBundle.git
      target=/bundles/Blage/ConnectBundle

then run the installer

    php bin/vendor install

update your `autoload.yml`.

```php
$loader->registerNamespaces(array(
    //...
    'Blage'            => __DIR__.'/../vendor/bundles'
    //...
));
```

##via [`composer`](https://github.com/composer/composer)##

update your `composer.json` to include this Bundle.

``` json
{
    "require": {
        "monofone/connect-bundle": "*"
    }
}
```

get composer and update your dependencies.

    $ wget http://getcomposer.org/composer.phar
    $ php composer.phar update


##Activation##

After Installation add the Bundle to your Kernel config in `AppKernel.php`

```php
new Blage\ConnectBundle\BlageConnectBundle(),
```

Now configure the bundle in your `config.yml`.

    blage_connect:
        profile_name: <your_username>

##Usage##

Then, in a Template just render the badges for example as follows:

    {% render 'BlageConnectBundle:Connect:ownSensioBadge' %}

or your profiledata with:

    {% render 'BlageConnectBundle:Connect:ownSensioProfile' %}

Tests
-----

    $ vendor/vendors.php
    $ phpunit

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE