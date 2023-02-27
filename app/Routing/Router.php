<?php

namespace App\Routing;

class Router
{
    private array $routes = [];

    /*
    * Creates a new instance of the Router class.
    */
    public function __construct(public readonly array $config)
    {
        $this->mapRoutes($config, null);
    }

    public function mapRoutes(): void
    {
        foreach ($this->config as $namespace => $versions) {
            foreach ($versions as $versionCode => $version) {
                foreach ($version as $category => $routes) {
                    foreach ($routes as $route) {
                        $this->routes[] = new Route(
                            new $route[2],
                            sprintf("%s/%s/%s", $namespace, $versionCode, $category),
                            $route[0],
                            $route[3]
                        );
                    }
                }
            }
        }
    }

    public function routes(): array
    {
        return $this->routes;
    }
}
