# Linode Api V4 Laravel 5 package

[![Total Downloads](https://poser.pugx.org/agiuscloud/linode-api-laravel/downloads)](https://packagist.org/packages/agiuscloud/linode-api-laravel)
[![License](https://poser.pugx.org/agiuscloud/linode-api-laravel/license)](https://github.com/edisoncosta/linode-api-laravel/blob/master/LICENSE)

A simple wrapper to get started with the Linode V4 Api.

## Install
```
composer require agiuscloud/linode-api-laravel
```

After updating composer, add the ServiceProvider to the providers array in config/app.php
```
AgiusCloud\Linode\LinodeServiceProvider::class
```

Optionally you can use the Facade. Add this to your facades:
```
'Linode' => AgiusCloud\Linode\Facades\Linode::class
```

## Publish config file
```
php artisan vendor:publish
```

## Add your personal access token to your config (/config/linode.php) or env file
```
LINODE_TOKEN=Your_personal_access_token
```

You can create your token by visiting [your Linode](https://cloud.linode.com/profile/tokens) if you are using the newer linode manager.

## Usage
Add to your class
```
use AgiusCloud\Linode\Controllers\Linode;
```
To use
```
$linode = new Linode;

// list linodes
$linode->get('linode/instances');

// create a new linode
$linode->post('linode/instances', [
    "region" => "us-east-1a",
    "type" => "g5-standard-1"
]);

// update a linode
$linode->put('linode/instances/999', [
    "label" => "new label"
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

This Linode wrapper is open-sourced software licensed under the [MIT license](https://github.com/edisoncosta/linode-api-laravel/blob/master/LICENSE).
