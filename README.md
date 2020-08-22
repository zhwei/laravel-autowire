# Laravel Autowire Kit

## Usage

1. Composer

```bash
composer require zhwei/laravel-autowire
```

2. Register Service Provider (Lumen only)

```php
$app->register(\Zhwei\LaravelAutowire\AutowireServiceProvider::class);
```

3. Autowire

Any class implemented the `Zhwei\LaravelAutowire\AutowireAble` interface will trigger auto-wire after container resolution.

```php
class HelloController implements Zhwei\LaravelAutowire\AutowireAble
{
    /**
     * @autowire
     * @var \Illuminate\Contracts\Cache\Factory
     */
    protected $cache;

    public function hello()
    {
        return $this->cache->store()->get('hello');
    }
}
```

or trigger by your self:

```php
$hello = new HelloController();
Zhwei\LaravelAutowire\AutowireInjector::inject(app(), $hello);
```
