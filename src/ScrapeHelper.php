<?php

namespace App;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeHelper
{
    public static function fetchDocument(string $url): Crawler
    {
        $client = new Client();

        $response = $client->get($url);
        $title=$client->filter('products.title')->count();
        $price=$client->filter('products.price')->count();
        $imageUrl =$client->filter('products.image')->count();
        $capacityMB =$client->filter('products.capacityMB')->count();
        $color =$client->filter('products.color')->count();
        $availablilityTest =$client->filter('products.availability')->count();
        $isAvailable =$client->filter('products.isAvailable')->count();
        $shippingText =$client->filter('products.shippingText')->count();
        $shippingDate =$client->filter('products.shippingDate')->count();


        return new Crawler($response->getBody()->getContents(), $url);
    }
}
