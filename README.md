# Get Enum values from database For Laravel

laravel-db-enum is a trait for laravel models. use this trait on modules for getting the table fileds enum values.

tags: laravel, lumen, eloquent, enum field
    
### Installing
Pull this package via Composer.
```js
    {
        "require": {
            "mohsentm/laravel-db-enum": "^1.*"
        }
    }
    
```
or run in terminal:
`composer require mohsentm/laravel-db-enum`

## Usage
use this trait `use Mohsentm\EnumValue;` your the model.<br>

```php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Mohsentm\EnumValue;

class TestModal extends Model
{
	protected $table = "test";
    //Get enum value trait
  	use EnumValue;
}

```
then use __`getEnumValues()`__ function to get enum values

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestModal;

class TestController extends Controller
{
	public function index(){
    	//return the array of table enum value list
		return TestModal::getEnumValues();
	}
}

```
result
```js
{"user_status":["enable","disable"]}
```

## Cache
To have best performance this package cache the result. 

## Contribute

Would you like to help with this project?  Great!  You don't have to be a developer, either.  If you've found a bug or have an idea for an improvement, please open an [issue](https://github.com/mohsentm/laravel-db-enumr/issues) and tell us about it.

If you *are* a developer wanting contribute an enhancement, bug fix or other patch to this project, please fork this repository and submit a pull request detailing your changes. We review all PRs!
This open source project is released under the [Apache 2.0 license](https://opensource.org/licenses/Apache-2.0) which means if you would like to use this project's code in your own project you are free to do so.  Speaking of, if you have used our code in a cool new project we would like to hear about it!  [Please send us an email](mailto:hosseini.m1370@gmail.com).

## License

Please refer to the [LICENSE](https://opensource.org/licenses/Apache-2.0) file that came with this project.
