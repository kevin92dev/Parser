<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="imageLink", type="string", length=255)
     */
    private $imageLink;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=2, scale=10)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="reducedPrice", type="decimal", precision=2, scale=10, nullable=true)
     */
    private $reducedPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="ean", type="integer", unique=true)
     */
    private $ean;

    /**
     * @var int
     *
     * @ORM\Column(name="customId", type="integer")
     */
    private $customId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Product
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageLink
     *
     * @param string $imageLink
     *
     * @return Product
     */
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;

        return $this;
    }

    /**
     * Get imageLink
     *
     * @return string
     */
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set reducedPrice
     *
     * @param string $reducedPrice
     *
     * @return Product
     */
    public function setReducedPrice($reducedPrice)
    {
        $this->reducedPrice = $reducedPrice;

        return $this;
    }

    /**
     * Get reducedPrice
     *
     * @return string
     */
    public function getReducedPrice()
    {
        return $this->reducedPrice;
    }

    /**
     * Set ean
     *
     * @param integer $ean
     *
     * @return Product
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get ean
     *
     * @return int
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set customId
     *
     * @param integer $customId
     *
     * @return Product
     */
    public function setCustomId($customId)
    {
        $this->customId = $customId;

        return $this;
    }

    /**
     * Get customId
     *
     * @return int
     */
    public function getCustomId()
    {
        return $this->customId;
    }
}

