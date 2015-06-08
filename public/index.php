<?php

require_once('../app/helper/helper.php');
require_once('../app/system/Template.php');
require_once('../app/bootstrap.php');

try {

    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    //Setting up the view component
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

   $di->set('db', function(){
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
                'host' => 'localhost',
                'username' => 'root',
                'password' => 'admin',
                'dbname' => 'loja'
            ));
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}