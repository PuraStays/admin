<?php

namespace App\Controller;
use Cake\Controller\Component\RequestHandlerComponent;
use Cake\Controller\Controller;
use Cake\Event\Event;


class AppController extends Controller
{

    public function initialize()
    {

        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
/*
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authentiate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'userModel' => 'User'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
 */
    }
    //
    public function menu_status($parm1, $parm2)
    {
        if($parm1==$parm2)
        {
            return 'active';
        }
    }

   
    
}
