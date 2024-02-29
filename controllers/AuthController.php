<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;;

use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Registration successful and data is written to the database ';
            }

            echo '<pre>';
            var_dump($registerModel->errors);
            echo '</pre>';
            // show ERRORS

            $this->setLayout('auth');
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}
