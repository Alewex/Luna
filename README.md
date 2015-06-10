# Luna
#### A small and super simple PHP framework
---
### Todo
- Create the ViewHandler and ControllerHandler.
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
By default, the 404 error page is located under vendor/Luna/Resources/Views/Erorrs, but if you have your own error pages you can drop them in the resources directory. You only have to add the following line in your index file.
```php
$resources->path('path/to/resources/);
```

#### Adding a service
On the bootstrap file you can add services, these services must be under the vendor directory.
```php
$services = [
  'MyService' => new Test\Service;
];

$myService = $services['MyService'];
```
