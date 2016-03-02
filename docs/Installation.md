# Installation

Install the plugin via composer:

```sh
composer require burzum/cakephp-database-log
```

Run migrations to create the DB log table.

```sh
bin/cake bake migrations migrate -p Burzum/DatabaseLog
```

Configure the log engine in your `app.php`, pay attention to the `className` keys:

```php
	'Log' => [
		'debug' => [
			'className' => 'Burzum/DatabaseLog.Database',
			'path' => LOGS,
			'file' => 'debug',
			'levels' => ['notice', 'info', 'debug'],
		],
		'error' => [
			//'className' => 'Cake\Log\Engine\FileLog',
			'className' => 'Burzum/DatabaseLog.Database',
			'path' => LOGS,
			'file' => 'error',
			'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
		],
	]
```

For additional information about logging please [read the whole logging section of the official documentation](http://book.cakephp.org/3.0/en/core-libraries/logging.html).
