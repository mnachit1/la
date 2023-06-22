<?php

namespace ContainerOXsEr9L;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAssociationsControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\AssociationsController' shared autowired service.
     *
     * @return \App\Controller\AssociationsController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/AssociationsController.php';

        $container->services['App\\Controller\\AssociationsController'] = $instance = new \App\Controller\AssociationsController(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('App\\Controller\\AssociationsController', $container));

        return $instance;
    }
}
