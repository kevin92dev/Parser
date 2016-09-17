<?php

namespace AppBundle\Entity;

use JMS\Serializer\Annotation as JMS;

class Item
{
    /**
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @JMS\Type("string")
     */
    private $link;

    /**
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("g:image_link")
     */
    private $imageLink;

    /**
     * @JMS\Type("double")
     * @JMS\SerializedName("g:price")
     */
    private $price;

    /**
     * @JMS\Type("double")
     * @JMS\SerializedName("g:reduced_price")
     */
    private $reducedPrice;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("g:ean")
     */
    private $ean;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("g:id")
     */
    private $customId;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * @param mixed $imageLink
     */
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getReducedPrice()
    {
        return $this->reducedPrice;
    }

    /**
     * @param mixed $reducedPrice
     */
    public function setReducedPrice($reducedPrice)
    {
        $this->reducedPrice = $reducedPrice;
    }

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getCustomId()
    {
        return $this->customId;
    }

    /**
     * @param mixed $customId
     */
    public function setCustomId($customId)
    {
        $this->customId = $customId;
    }
}