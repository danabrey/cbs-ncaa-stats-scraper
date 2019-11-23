<?php

namespace DanAbrey\CBSNCAAStatsScraper;

use DanAbrey\CBSNCAAStatsScraper\Crawler\PlayerCrawler;
use Goutte\Client;

class Scraper
{
    /**
     * Given a player ID, scrape CBS and return a PlayerStats object containing relevant data
     * If an invalid ID (page not found on CBS), throw an exception
     * @param int $playerId
     * @return Player
     */
    public function getPlayerStats(int $playerId): Player
    {
        $url = sprintf('https://www.cbssports.com/collegefootball/players/playerpage/%s/random-string', $playerId);

        $client = new Client();
        $crawler = $client->request('GET', $url);
        $player = new Player();
        $player->setId($playerId);

        $playerCrawler = new PlayerCrawler();

        $position = $playerCrawler->extractPlayerPosition($crawler);
        $player->setPosition($position);

        $name = $playerCrawler->extractPlayerName($crawler);
        $player->setName($name);

        $college = $playerCrawler->extractPlayerCollege($crawler);
        $player->setCollege($college);

        $seasons = $playerCrawler->buildSeasonDataFromCrawler($crawler);
        $player->setSeasons($seasons);

        return $player;
    }
}
