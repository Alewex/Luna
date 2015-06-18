# Luna
#### A small and super simple PHP framework
I know there are tons of frameworks (specially micro) out there that have better functionality and are way faster, **this one is not intended to be innovative or any different from the others**, this one is just the product of my free time and curiosity to see if I could craft a basic yet functional framework with my achieved skills so far.

Feedback is more than appreciated.

### Todo
- ~~Create the ViewHandler and ControllerHandler.~~
- That's all, I want to keep it simple.

### Usage
#### Adding a route to the collection
```php
// GET route.
$app->get('/home', function(
{
  echo "Welcome to Luna!";
});
```

```php
// POST route.
$app->post('/create', function(
{
  echo "Hey there! This is a POST route.";
});
```

```php
// Multi-route.
$app->post(['/', '/home'], function(
{
  echo "Welcome! You can see this with either '/' or '/home'";
});
```

#### Custom error pages
By default, the 404 error page is located under vendor/Luna/Resources/Views/Errors, but if you have your own error pages you can drop them in the resources directory. You only have to add the following line in your index file.
```php
$resources->path('path/to/resources/');
```

### Creating a controller
All controllers must extend the BaseController class found at vendor/Luna/Services/HTTP/Controllers and must have a "main" function.
```php
use Luna\Services\HTTP\Controllers\BaseController;

class MyController extends BaseController
{
  public function main()
  {
    echo "Welcome!";
  }
}
```

#### Adding a service
On the bootstrap file you can add services, these services must be under the vendor directory.
```php
$services = [
  'MyService' => new Test\Service;
];

$myService = $services['MyService'];
```
