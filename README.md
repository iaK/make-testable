#

[![Latest Version on Packagist](https://img.shields.io/packagist/v/iak/make-testable.svg?style=flat-square)](https://packagist.org/packages/iak/make-testable)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/iak/make-testable/run-tests?label=tests)](https://github.com/iak/make-testable/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/iak/make-testable.svg?style=flat-square)](https://packagist.org/packages/iak/make-testable)


Create a test along with any laravel model, controller, event and so on.

## Usage

Simply add on a --test option to your make commands, and a test will be created in the corresponding location in your test folder.

### Example

```bash
$ php artisan make:model Blog --test
```

is the same as

```bash
$ php artisan make:model Blog
$ php artisan make:test Models\BlogTest --unit
```

You can make tests for the following classes:

* Command
* Controller
* Event
* Job
* Listener
* Middleware
* Model
* Notification

## Todo

* Export a config file with customizable locations, naming convetions and options for the test command.

## Installation

You can install the package via composer:

```bash
composer require iak/make-testable
```

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Isak Berglind](https://github.com/iaK)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
