<?php

// src/AppBundle/Controller/AdminController.php

namespace NTPBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as EasyAdminController;

class AdminController extends EasyAdminController {

    /**
     * @Route("/admin/", name="admin")
     */
    public function indexAction(Request $request) {
        return parent::indexAction($request);
    }

    public function createNewUsersEntity() {
        return $this->container->get('fos_user.user_manager')->createUser();
    }

    public function prePersistUsersEntity(User $user) {
        $this->container->get('fos_user.user_manager')->updateUser($user, false);
    }

    public function preUpdateUsersEntity(User $user) {
        $this->container->get('fos_user.user_manager')->updateUser($user, false);
    }

}
