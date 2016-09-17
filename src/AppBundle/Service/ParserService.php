<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DomCrawler\Crawler;

class ParserService
{

    private $em;

    /**
     * ParserService constructor.
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Download the products feed and save parsed data in DB.
     *
     * @param string $url The URL of the feed
     *
     * @return void
     */
    public function downloadProductsFeed($output, $url)
    {
        $output->writeln('Start crawling process. URL: '.$url);

        $content = file_get_contents($url);
        $crawler = new Crawler($content);

        // Do action for each found item
        $crawler->filterXPath('//default:rss/channel/item')->each(function (Crawler $node, $i) {

            // Collect data
            $title        = $node->filterXPath('//title')->text();
            $link         = $node->filterXPath('//link')->text();
            $description  = $node->filterXPath('//description')->text();
            $imageLink    = $node->filterXPath('//g:image_link')->text();
            $price        = $node->filterXPath('//g:price')->text();
            $reducedPrice = $node->filterXPath('//g:reduced_price')->text();
            $ean          = $node->filterXPath('//g:ean')->text();
            $customId     = $node->filterXPath('//g:id')->text();

            // Get a product for a given EAN
            $product = $this->getProduct($ean);

            // Set data to Product
            $product->setTitle($title);
            $product->setLink($link);
            $product->setDescription($description);
            $product->setImageLink($imageLink);
            $product->setPrice($price);
            $product->setReducedPrice($reducedPrice);
            $product->setCustomId($customId);

            // Persist changes
            $this->em->persist($product);
            $this->em->flush();
        });
    }

    /**
     * Check if product exists and return it, if not exists create it.
     *
     * @param integer $ean The EAN code.
     *
     * @return Product Return product instance
     */
    public function getProduct($ean)
    {
        if (empty($ean))
            return new Product();

        $product = $this->em->getRepository('AppBundle:Product')->findOneBy(array('ean' => $ean));

        if (!$product instanceof Product) {
            $product = new Product();
        }

        return $product;
    }
}