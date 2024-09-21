<?php

declare(strict_types=1);

/*
 * This file is part of ContaoDynamicLogin.
 *
 * (c) Harald Huber
 *
 * @license LGPL-3.0-or-later
 */

namespace Hhcom\ContaoDynamicLogin\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Symfony\Component\HttpFoundation\RequestStack;
use Contao\FrontendUser;
use Contao\PageModel;
use Contao\LayoutModel;
use Contao\PageRegular;

/**
 * @Hook("getPageLayout")
 */
class GetPageLayoutListener
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    
    public function __invoke(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    { 
        $GLOBALS["TL_JAVASCRIPT"][] = "bundles/contaodynamiclogin/script/dynamiclogin.js";
        $GLOBALS["TL_CSS"][] = "bundles/contaodynamiclogin/style/dynamiclogin.scss|static";

        $user = FrontendUser::getInstance();

        $GLOBALS['TL_HEAD'][] = "<script>
        const userisloggedin = ".($user->id ? "true" : "false").";
        const lgnRoot = '".$pageModel->rootId ."';
        </script>";

    }

}

?>