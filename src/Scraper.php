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
        $player->id = $playerId;

        $playerCrawler = new PlayerCrawler();

        $position = $playerCrawler->extractPlayerPosition($crawler);
        $player->position = $position;

        $name = $playerCrawler->extractPlayerName($crawler);
        $player->name = $name;

        $college = $playerCrawler->extractPlayerCollege($crawler);
        $player->college = $college;

        $seasons = $playerCrawler->buildSeasonDataFromCrawler($crawler);
        $player->seasons = $seasons;

        return $player;
    }
}
