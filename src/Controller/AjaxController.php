<?php

declare(strict_types=1);

/*
 * This file is part of ContaoDynamicLogin.
 *
 * (c) Harald Huber
 *
 * @license LGPL-3.0-or-later
 */

namespace Hhcom\ContaoDynamicLogin\Controller;

use Contao\FrontendTemplate;
use Symfony\Component\HttpFoundation\JsonResponse; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Contao\PageModel;
use Contao\System;
use Contao\ModuleModel;

class AjaxController
{

    public function loadIframe(Request $request) {

        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array(
                'status' => 'error',
                'message' => 'Only ajax requests are allowed'
            ),400);
        }

        $isgranted = System::getContainer()->get('security.authorization_checker')->isGranted('ROLE_MEMBER');
        if($isgranted) {
            return new Response( "" ); 
        }
        
        //$_locale = $request->get('_locale'); // de || en ...
        $loginModulId = $request->get('loginModulId');

        $template = new FrontendTemplate('mod_dynamiclogin');
        $template->pathToLoginPage = $this->getLoginPageFromModule($loginModulId);
        $template->loginredirect = $this->getRedirectionPageFromModule($loginModulId, $request);
        $output = $template->parse();
        
        return new Response( $output );

    }


    public function getRedirectionPageFromModule($loginModuleId, $request)
    {
        $module = ModuleModel::findByPk($loginModuleId);

        if ($module == null) {
            return "/";
        }

        $redirect = "/";
        if ($module->redirectBack){
            #$redirect = @$_SERVER['HTTP_REFERER'] ?: "/";
            $redirect = $request->headers->get('REFERER');
        } elseif ($module->jumpTo) {
            $page = PageModel::findByPk($module->jumpTo);
            $redirect = System::getContainer()->get('contao.routing.content_url_generator')->generate($page);
        } else {

        }

        return $redirect;
    }


  public function getLoginPageFromModule($loginModuleId)
    {
        $iframepage = "";
        $module = ModuleModel::findByPk($loginModuleId);

        if ($module == null) {
            return $iframepage;
        }

        $page = PageModel::findByPk($module->iframepage);
        if ($page) {
            $iframepage = System::getContainer()->get('contao.routing.content_url_generator')->generate($page);
        }


        return $iframepage;
    }




}