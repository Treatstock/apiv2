<h1>Installation</h1>

<h2>Via composer</h2>

To plug into your project, add into your <b>composer.json</b>:

<pre>
    "repositories": [
        ...
        {
            "type": "package",
            "package": {
                "name": "treatstock/apiv2",
                "version": "1.0",
                "source": {
                    "url": "https://github.com/Treatstock/apiv2.git",
                    "type": "git",
                    "reference": "master"
                }
            }
        }
    ]
</pre>

Add package from command prompt:

<pre>
composer require treatstock/apiv2
</pre>

And install: 

<pre>
composer install
</pre>
