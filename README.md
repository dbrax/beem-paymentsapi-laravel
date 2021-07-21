
[![Latest Version on Packagist](https://img.shields.io/packagist/v/epmnzava/beempayments.svg?style=flat-square)](https://packagist.org/packages/epmnzava/beempayments)
[![Total Downloads](https://img.shields.io/packagist/dt/epmnzava/beempayments.svg?style=flat-square)](https://packagist.org/packages/epmnzava/beempayments)
![GitHub Actions](https://github.com/epmnzava/beempayments/actions/workflows/main.yml/badge.svg)



## Installation

You can install the package via composer:

```bash
composer require epmnzava/beempayments
```

## Usage

```php
// 
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Epmnzava\Annoucement\Annoucement;
use Epmnzava\LaravelCms\LaravelCms;
use Epmnzava\MpesaTanzania\MpesaTanzania;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;
use Epmnzava\Beempayments\Beempayments;

class CheckoutController extends Controller
{
   


public function beemCheckout(){

	//create a beempayment instance
    $bpay=new Beempayments;

   //use the checkout method to request a payment.
   //remember the arguments should be created from your system.
  $res=$bpay->checkout("50000","255701000000","SAMPLE-12345","96f9cc09-afa0-40cf-928a-d7e2b27b2411");

 //convert your reponse to an array to access src
 $response=json_decode($res);


// go to the link provided
return redirect($response->src);
//reponse doc coming soon




}

```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email emmanuel@opensource.co.tz instead of using the issue tracker.

## Credits

-   [Emmanuel Mnzava](https://github.com/epmnzava)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
