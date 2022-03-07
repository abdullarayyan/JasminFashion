+--------+-----------+----------------------------+-------------------+------------------------------------------------------------------------+---------------------------------------------+
| Domain | Method    | URI                        | Name              | Action                                                                 | Middleware                                  |
+--------+-----------+----------------------------+-------------------+------------------------------------------------------------------------+---------------------------------------------+
|        | GET|HEAD  | /                          | home              | App\Http\Controllers\HomeController@index                              | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | accessory                  | accessory.index   | App\Http\Controllers\AccessoryController@index                         | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | accessory                  | accessory.store   | App\Http\Controllers\AccessoryController@store                         | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | accessory/create           | accessory.create  | App\Http\Controllers\AccessoryController@create                        | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | accessory/{accessory}      | accessory.show    | App\Http\Controllers\AccessoryController@show                          | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | DELETE    | accessory/{accessory}      | accessory.destroy | App\Http\Controllers\AccessoryController@destroy                       | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | PUT|PATCH | accessory/{accessory}      | accessory.update  | App\Http\Controllers\AccessoryController@update                        | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | accessory/{accessory}/edit | accessory.edit    | App\Http\Controllers\AccessoryController@edit                          | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | api/user                   |                   | Closure                                                                | api                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
|        | GET|HEAD  | foo                        |                   | Closure                                                                | web                                         |
|        | GET|HEAD  | home                       | home              | App\Http\Controllers\HomeController@index                              | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | login                      |                   | App\Http\Controllers\Auth\LoginController@login                        | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | GET|HEAD  | login                      | login             | App\Http\Controllers\Auth\LoginController@showLoginForm                | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | POST      | logout                     | logout            | App\Http\Controllers\Auth\LoginController@logout                       | web                                         |
|        | GET|HEAD  | password/confirm           | password.confirm  | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | password/confirm           |                   | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | password/email             | password.email    | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web                                         |
|        | POST      | password/reset             | password.update   | App\Http\Controllers\Auth\ResetPasswordController@reset                | web                                         |
|        | GET|HEAD  | password/reset             | password.request  | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web                                         |
|        | GET|HEAD  | password/reset/{token}     | password.reset    | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web                                         |
|        | GET|HEAD  | product                    | product.index     | App\Http\Controllers\ProductController@index                           | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | product                    | product.store     | App\Http\Controllers\ProductController@store                           | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | product/create             | product.create    | App\Http\Controllers\ProductController@create                          | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | DELETE    | product/{product}          | product.destroy   | App\Http\Controllers\ProductController@destroy                         | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | PUT|PATCH | product/{product}          | product.update    | App\Http\Controllers\ProductController@update                          | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | product/{product}          | product.show      | App\Http\Controllers\ProductController@show                            | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | product/{product}/edit     | product.edit      | App\Http\Controllers\ProductController@edit                            | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | register                   |                   | App\Http\Controllers\Auth\RegisterController@register                  | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | GET|HEAD  | register                   | register          | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web                                         |
|        |           |                            |                   |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | GET|HEAD  | sanctum/csrf-cookie        |                   | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show             | web                                         |
+--------+-----------+----------------------------+-------------------+------------------------------------------------------------------------+---------------------------------------------+
