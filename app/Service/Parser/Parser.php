<?php

namespace App\Service\Parser;
use Goutte\Client;

class Parser
{
    private $client;
    private $filter_class;
    public $start_link;
    private $results = [];

    public function __construct($start_link, $filter_class)
    {
        $this->start_link = $start_link;
        $this->filter_class = $filter_class;
        $client = new Client();
        $this->client = $client->request('GET', $this->start_link);
    }

    public function parseNames()
    {
        $this->client->filter($this->filter_class)->each(function ($node) {
            $this->results[] = $node->text();
        });
        return $this->results;
    }


}
