<?php

declare(strict_types=1);

/*
 * This file is part of ContaoDynamicLogin.
 *
 * (c) Harald Huber
 *
 * @license LGPL-3.0-or-later
 */

namespace Hhcom\ContaoDynamicLogin\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Symfony\Component\Routing\RouteCollection;
use Hhcom\ContaoDynamicLogin\ContaoDynamicLogin;

class Plugin implements BundlePluginInterface, RoutingPluginInterface
{
	
	 /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoDynamicLogin::class) 
                ->setLoadAfter([
                    'Contao\CoreBundle\ContaoCoreBundle'
                    ]),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel): RouteCollection|null
    {
        return $resolver
            ->resolve(__DIR__.'/../../config/routing.yml')
            ->load(__DIR__.'/../../config/routing.yml')
        ;
    }
}