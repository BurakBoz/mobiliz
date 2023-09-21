# Mobiliz API PHP Library

![GitHub](https://img.shields.io/github/license/burakboz/mobiliz)
![GitHub tag (latest SemVer)](https://img.shields.io/github/v/tag/burakboz/mobiliz)
![Packagist Version](https://img.shields.io/packagist/v/burakboz/mobiliz)
![PHP Version](https://img.shields.io/packagist/php-v/burakboz/mobiliz)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/burakboz/mobiliz/CI)

**Mobiliz API** is a PHP library for interacting with the Mobiliz Tracking Systems API (www.mobiliz.com.tr). It provides an incomplete implementation of the API and is compatible with PHP 7.x and 8.x.

## Notes
**Note**: This library may not fully implement all features of the Mobiliz Tracking Systems API. Use it at your own discretion. Contributions are encouraged to make it more robust and feature-complete.

This piece of code was originally developed for a customer project. They suggested sharing it on GitHub, as others may find it useful.

In short, it was coded in PHP 7.4 as of 2023.

Please note that this is not a complete implementation of the Mobiliz API; we have only implemented what we needed. If you require additional functionality, you can hire me to complete the implementation.

Happy coding!

## Features

- Seamless integration with the Mobiliz Tracking Systems API.
- Simplified access to tracking and related functionalities.
- MIT License - You are free to use this library in your projects.

## Installation

You can install this library via Composer. Run the following command:

```bash
composer require burakboz/mobiliz
```

## Requirements

- PHP >= 7.4
- `ext-curl` extension

## Usage

```php
use BurakBoz\Mobiliz\MobilizClient;

$client = new MobilizClient('your_api_key');

// Example: Get a list of vehicles
$vehicles = $client->vehicles();

// Example: Get last activity information
$activities = $client->activityLast();
```

## Implemented functions
1. `formatPlate`
2. `activityLast`
3. `activityLast`
4. `locations`
5. `drivers`
6. `vehicles`
7. `groups`
8. `fleets`
9. `eventCodes`
10. `properties`
11. `vehicleTypes`
12. `vehicleSubTypes`
13. `violationTypes`
14. `reportCanBusDetail`
15. `reportActivityDetail`

For more detailed usage instructions, please refer to the [examples](https://github.com/BurakBoz/mobiliz/tree/main/examples/examples.php).

## Contributing

Contributions are welcome! If you find a bug, have a feature request, or want to contribute code or documentation, please create an issue or pull request in this repository.

## Security

If you discover any security-related issues, please contact us at [security@burakboz.net](mailto:security@burakboz.net).

## License

This library is open-source software licensed under the [MIT License](LICENSE). Feel free to use it in your own projects.

## About the Author

This library is maintained by [Burak Boz](https://www.burakboz.net). You can reach out to the author at [info@burakboz.net](mailto:info@burakboz.net).

## Keywords

mobiliz, library, package, tracking, api

---
