<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Product;

class StockListener
{
    protected $container;

    public function __construct(ContainerInterface $container){
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args){
        $entity = $args->getEntity();

        if ($entity instanceof Product) {
            $em = $args->getEntityManager();

            $entity->setStock(1);

            $em->persist($entity);
            $em->flush();
        }

    }
}

?>