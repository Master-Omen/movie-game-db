<?php

namespace App\Models;

use CodeIgniter\Model;

class Free_api extends Model
{

    protected $client;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }

    public function get_api($query = 'spice and wolf')
    {
        $get_api = $this->client->get('https://imdb.iamidiotareyoutoo.com/search', [
            'query' => ['q' => $query]
        ])->getBody();

        $get_api = json_decode($get_api, true);

        if ($get_api['error_code'] == '200') {
            return $get_api['description'];
        } else {
            dd($get_api['error_code']);
        }
    }

    public function more($id)
    {
        $get_api = $this->client->get('https://imdb.iamidiotareyoutoo.com/search', [
            'query' => ['tt' => $id]
        ])->getBody();

        $get_api = json_decode($get_api, true);

        $filter = [];

        $filter['imdbId'] = $get_api['imdbId'];
        $filter['title'] = $get_api['top']['titleText']['text'];
        $filter['ori_title'] = $get_api['top']['originalTitleText']['text'];
        $filter['releaseDate'] = isset($get_api['top']['releaseDate']['year']) ? $get_api['top']['releaseDate']['year'] : "No Year";
        $filter['runtime'] = isset($get_api['top']['runtime']['displayableProperty']['value']['plainText']) ? $get_api['top']['runtime']['displayableProperty']['value']['plainText'] : 'No Runtime';
        $filter['ratingsSummary'] = isset($get_api['top']['ratingsSummary']['aggregateRating']) ?  $get_api['top']['ratingsSummary']['aggregateRating'] : 0.0;
        $filter['genres'] = $get_api['top']['genres']['genres'];
        $filter['plot'] = isset($get_api['top']['plot']['plotText']['plainText']) ? $get_api['top']['plot']['plotText']['plainText'] : 'no plot';
        $filter['primaryImage'] = isset($get_api['top']['primaryImage']['url']) ? $get_api['top']['primaryImage']['url'] : base_url('img/no-img.jpg');

        $filter['type'] = $get_api['main']['titleType']['id'];
        $filter["images"] = $get_api["main"]["titleMainImages"]["edges"] ?? ["N/A", "N/A"];
        $filter["thumbnail"] = isset($get_api["top"]["primaryVideos"]["edges"][0]["node"]['thumbnail']['url']) ? $get_api["top"]["primaryVideos"]["edges"][0]["node"]['thumbnail']['url'] : base_url('img/no-img.jpg');

        if ($get_api['error_code'] == '200') {
            return $filter;
        } else {
            dd($get_api['error_code']);
        }
    }

    public function video($id)
    {
        $get_api = $this->client->get('https://imdb.iamidiotareyoutoo.com/media/' . $id)->getBody();

        dd($get_api);
    }
}
