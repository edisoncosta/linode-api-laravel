# Linode Api V4 Laravel 5 package

[![Total Downloads](https://poser.pugx.org/kudosagency/linodev4/downloads)](https://packagist.org/packages/kudosagency/linodev4)
[![License](https://poser.pugx.org/kudosagency/linodev4/license)](https://github.com/kudosagency/linodev4/blob/master/LICENSE)

A simple wrapper to get started with the Linode V4 Api.

## Install
```
composer require kudosagency/linodev4
```

After updating composer, add the ServiceProvider to the providers array in config/app.php
```
Kudosagency\Linodev4\LinodeV4ServiceProvider::class
```

Optionally you can use the Facade. Add this to your facades:
```
'Linode' => Kudosagency\Linodev4\Facades\Linode::class
```

## Publish config file
```
php artisan vendor:publish
```

## Add your personal access token to your config (/config/linodev4.php) or env file
```
LINODEV4_TOKEN=Your_personal_access_token
```

You can create your token by visiting [your Linode](https://cloud.linode.com/profile/integrations/tokens) or [your Linode](https://cloud.linode.com/profile/tokens) if you are using the newer linode manager.

## Usage
Add to your class
```
use Kudosagency\Linodev4\Controllers\Linode;
```
To use
```
$linode = new Linode;

// list linodes
$linode->get('linode/instances');

// create a new linode
$linode->post('linode/instances', [
    "region": "us-east-1a",
    "type": "g5-standard-1"
]);

// update a linode
$linode->put('linode/instances/999', [
    "label": "new label"
]);

// delete a linode
$linode->delete('linode/instances/999');

```

Or, you can use the facade
```
Linode::get('linode/instances');
```

[Full API reference](https://developers.linode.com/v4/introduction)

## License

This Linode wrapper is open-sourced software licensed under the [MIT license](https://github.com/kudosagency/linodev4/blob/master/LICENSE).
