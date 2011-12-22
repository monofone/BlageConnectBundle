BlageConnectBundle
==================

Inlcude the Bundle in your deps File and run bin/vendor install

    [BlageConnectBundle]
      git=git://github.com/monofone/BlageConnectBundle.git
      target=/bundles/Blage/ConnectBundle

After finishing the update add the Bundle to your Kernel config

    new Blage\ConnectBundle\BlageConnectBundle(),

Then, in a Template just render the badges for example as follow

    {% render 'BlageConnectBundle:Connect:ownSensioBadge' %}

or your profiledata with 

    {% render 'BlageConnectBundle:Connect:ownSensioProfile' %}