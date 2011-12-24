BlageConnectBundle
==================

Inlcude the Bundle in your deps File

    [BlageConnectBundle]
      git=git://github.com/monofone/BlageConnectBundle.git
      target=/bundles/Blage/ConnectBundle

then run the installer

    php bin/vendor install

After finishing the update add the Bundle to your Kernel config

    new Blage\ConnectBundle\BlageConnectBundle(),

Now write in your config.yml the username

    blage_connect:
        profile_name: <your_username>

Then, in a Template just render the badges for example as follows:

    {% render 'BlageConnectBundle:Connect:ownSensioBadge' %}

or your profiledata with:

    {% render 'BlageConnectBundle:Connect:ownSensioProfile' %}

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE