<?php

namespace Pulse;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use League\Route\RouteCollection as Router;
use Illuminate\Database\Capsule\Manager;
use Pulse\Exception\AppException;
use League\Container\Container;
use Pulse\ServiceProvider;

class Application
{

	public $container;
	public $capsule;

	public function __construct(Container $container)
	{
		$provider = new ServiceProvider;
		$provider->setContainer($container);

		$this->container = $provider->getContainer();
	}

	public function eloquent(Manager $capsule)
	{
		$this->capsule = $capsule;

		$credentials = require_once '../config/database.php';

		$this->capsule->addConnection([
			'driver' => 'mysql',
			'host' => $credentials['host'],
			'database' => $credentials['database'],
			'username' => $credentials['username'],
			'password' => $credentials['password'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => $credentials['prefix']
		]);

		$this->capsule->setAsGlobal();
		$this->capsule->bootEloquent();
	}

	public function session(Session $session)
	{
		$session->setName('pulse_session');
		$session->start();
	}

	public function dispatch(Response $response, Router $router)
	{
		$this->getRoutes($router);

		$dispatcher = $router->getDispatcher();
		$request = Request::createFromGlobals();

		try
		{
			$response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
			$response->send();
		} catch(\League\Route\Http\Exception\NotFoundException $e)
		{
			$response->setContent(
				$this->container->get('Blade')->render('errors/404')
			);
			$response->setStatusCode(Response::HTTP_NOT_FOUND);
			$response->send();
		} catch(\League\Route\Http\Exception\MethodNotAllowedException $e)
		{
			$response->setContent(json_encode([
				'status' => 405,
				'message' => $e->getMessage()
			], JSON_PRETTY_PRINT));
			$response->setStatusCode(Response::HTTP_METHOD_NOT_ALLOWED);
			$response->headers->set('Content-Type', 'application/json');
			$response->send();
		}
	}

	public function getRoutes($router)
	{
		$path = '../config/routes.php';
		if (file_exists($path))
		{
			require_once $path;
			return true;
		}

		throw new \Exception('Routes file not found.');
	}

	public static function stop($reason = 'Application stopped.')
	{
		$response = new Response;
		$response->setStatusCode(Response::HTTP_SERVICE_UNAVAILABLE);
		$response->send();

		throw new AppException($reason);
	}

}
