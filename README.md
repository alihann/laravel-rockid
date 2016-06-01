# Laravel Rockid

Id obfuscation for Laravel using [Optimus](https://github.com/jenssegers/optimus).

### How to Install

1. composer require

    ```bash
    composer require alihann/laravel-rockid
    ```
2. in your config/app.php

    ```php
    'providers' => [
            App\Providers\EventServiceProvider::class,
            App\Providers\RouteServiceProvider::class,
            ...
            Alihann\LaravelRockid\RockidServiceProvider::class,
        ],
    ```

3. and if you want to use facade

    ```php
    'aliases' => [
            'Validator' => Illuminate\Support\Facades\Validator::class,
            'View' => Illuminate\Support\Facades\View::class,
            ...
            'Rockid' => Alihann\LaravelRockid\Facades\Rockid::class,
        ],
    ```

4. publish the config file

    ```bash
    php artisan vendor:publish
    ```

5. generate numbers and add to the published config file. (i.e. config/rockid.php)

    ```bash
    php artisan rockid:generate
    ```

### Usage

you can use ObfuscatesId trait to get the obfuscated id of the model in your views.

    ```php
    use Illuminate\Database\Eloquent\Model;
    use Alihann\LaravalRockId\ObfuscatesId;

    class User extends Model {

      use ObfuscatesId;

    }
    ```
now you have getId method in your model to generate an obfuscated id.

    ```
    <a href="user/{{ $user->getId() }}">Show user</a>
    ```

routes.php

    ```php
    Route::bind('user', function ($value) {
        $id = Rockid::decode($value);
        return \App\User::find($id);
    });

    Route::get('user/{user}', function ($user) {
        return $user->getId();
    });
    ```

or in RouteServiceProvider class

    ```php
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->bind('user', function ($value) {
            $id = app('rockid')->decode($value);
            return \App\User::find($id);
        });
    }
    ```

