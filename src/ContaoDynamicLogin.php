<?php

declare(strict_types=1);

namespace Hhcom\ContaoDynamicLogin;
/*
 * This file is part of ContaoDynamicLogin.
 *
 * (c) Harald Huber
 *
 * @license LGPL-3.0-or-later
 */

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoDynamicLogin extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

    }
}
