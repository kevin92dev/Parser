<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;
use AppBundle\Entity\Item;
use Doctrine\ORM\EntityManager;
use JMS\Serializer\SerializerBuilder;

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
        //$xml = simplexml_load_file($url);
        $xml = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<channel version="2.0"
xmlns:g="http://base.google.com/ns/1.0">
<title>Products feeds</title>
<link>http://www.example.com/feed/products</link>
<description>Products feeds</description>
<items>
<item>
<title>Royal canin, 12kg</title>
<link>http://www.example.com/royalCanin12kg</link>
<description>Royal canin, 12kg senior light</description>
<g:image_link>http://www.example.com/image1.jpg</g:image_link>
<g:price>25</g:price>
<g:reduced_price>20</g:reduced_price>
<g:ean>12345</g:ean>
<g:id>1</g:id>
</item>
<item>
<title>Royal canin, 3kg</title>
<link>http://www.example.com/royalCanin3kg</link>
<description>Royal canin, 3kg senior light</description>
<g:image_link>http://www.example.com/image2.jpg</g:image_link>
<g:price>23</g:price>
<g:reduced_price>15</g:reduced_price>
<g:ean>12346</g:ean>
<g:id>1</g:id>
</item>
</items>
</channel>
EOT;

        // Create a serializer instance
        $serializer = SerializerBuilder::create()->build();

        // De-serialize XML and get Object with fields
        $channel = $serializer->deserialize($xml, 'AppBundle\Entity\Channel', 'xml');

        foreach ($channel->getItems() as $item) {
            $product = $this->createOrUpdateProduct($item);

            // Persist data
            $this->em->persist($product);
            $this->em->flush();
        }
    }

    /**
     * Check if product exists and update it. If not exist, then create it
     *
     * @param Item $item The item collected from XML.
     *
     * @return Product Return a product instance
     */
    public function createOrUpdateProduct(Item $item)
    {
        $product = $this->em->getRepository('AppBundle:Product')->findOneBy(array('ean' => $item->getEan()));

        if (!$product instanceof Product) {
            $product = new Product();
        }

        $product->setTitle($item->getTitle());
        $product->setLink($item->getLink());
        $product->setDescription($item->getDescription());
        $product->setImageLink($item->getImageLink());
        $product->setPrice($item->getPrice());
        $product->setReducedPrice($item->getReducedPrice());
        $product->setEan($item->getEan());
        $product->setCustomId($item->getCustomId());

        return $product;
    }
}