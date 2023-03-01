<?php

namespace app\controllers;
use morlowsk\corephp\Application;
use morlowsk\corephp\Controller;
use morlowsk\corephp\Request;
use morlowsk\corephp\Response;
use app\models\ContactForm;


/**
 * Summary of SiteController
 * @author Michal Orlowski
 * @copyright (c) 2023
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "The Eagle nest"
        ];
        return $this->render('home', $params);
    }
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) 
        {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send())
            {
                Application::$app->session->setFlash('success', 'Thanks for contact.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}