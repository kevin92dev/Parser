<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

class Channel
{
    /**
     * @JMS\Type("string")
     */
    public $title;

    /**
     * @JMS\Type("string")
     */
    public $link;

    /**
     * @JMS\Type("string")
     */
    public $description;

    /**
     * @JMS\Type("ArrayCollection<AppBundle\Entity\Item>")
     * @JMS\XmlList(entry="item")
     */
    public $items;

    public function __construct()
    {
        $this->item = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $item
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
}