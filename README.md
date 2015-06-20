# Luna
#### A small and super simple PHP framework
I know there are tons of frameworks (specially micro) out there that have better functionality and are way faster, **this one is not intended to be innovative or any different from the others**, this one is just the product of my free time and curiosity to see if I could craft a basic yet functional framework with my achieved skills so far.

Feedback is more than appreciated.

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

#### Controller or View as a route response
```php
// Controller
$app->get('/about', ['controller' => 'AboutController']);

// View
$app->get('/about', ['view' => ['view' => 'About', 'title' => 'About', 'data' => ['email' => 'me@example.com']]]);
```
