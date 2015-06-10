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
