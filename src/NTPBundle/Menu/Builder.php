<?php

namespace NTPBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use NTPBundle\Entity\Group as Group;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class Builder implements ContainerAwareInterface {

    use ContainerAwareTrait;
    public function __construct(EntityManager $em,  Container $container) {
        $this->container = $container;
        $this->em=$em;
        $this->groups = $this->container->get('security.token_storage')->getToken()->getUser()->getGroups(); 
        
    }
    
    
    public function mainMenu(FactoryInterface $factory, array $options) {
        $menuItem = new Entity\Menu;
        $securityContext = $this->container->get('security.authorization_checker');
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            foreach($this->groups as $group ){
                if($menuItem->getSubLevel()==0){
                     $menu->addChild($menuItem->getName(),array('uri' => '#', 'label' =>$menuItem->getName()))
                      ->setAttribute('dropdown', true)
                      ->setAttribute('icon', 'icon-user');
                }else
                    $rootLevel=$this->em->getRepository('NTPBundle:Menu')-> findOneByLevel($menuItem->getLevel());
                    //\Doctrine\Common\Util\Debug::dump($rootLevel->getName);
                    $menu[$rootLevel->getName()]->addChild($menuItem->getName(), array('route' => $menuItem->getRoute()));
            }
                return $menu;
        }
        return null;
    }

}
