<?php
namespace DanAbrey\CBSNCAAStatsScraper;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Scraper
{

    /**
     * Keys represent titles of data tables on CBS
     * Values represent related name of property on PlayerSeason DTO
     */
    private const DATATABLE_PARSER_MAP = [
        'Rushing' => [
            0 => 'team',
            1 => 'gamesPlayed',
            2 => 'rushingAttempts',
            3 => 'rushingYards',
            4 => 'rushingTouchdowns'
        ],
        'Receiving' => [
            0 => 'team',
            1 => 'gamesPlayed',
            2 => 'receptions',
            3 => 'receivingYards',
            4 => 'receivingTouchdowns'
        ],
        'Return' => [
            0 => 'team',
            1 => 'gamesPlayed',
            2 => 'puntReturns',
            3 => 'puntReturnYards',
            4 => 'puntReturnTouchdowns',
            5 => 'puntReturnLong',
            6 => 'kickoffReturns',
            7 => 'kickoffReturnYards',
            8 => 'kickoffReturnTouchdowns',
            9 => 'kickoffReturnLong',
        ],
        'Fumbles' => [
            0 => 'team',
            1 => 'gamesPlayed',
            2 => 'fumbles',
            3 => 'fumblesLost',
        ],
        'Passing Stats' => [
            0 => 'team',
            1 => 'gamesPlayed',
            2 => 'passingAttempts',
            3 => 'passingCompletions',
            4 => 'passingYards',
            5 => 'passingInterceptions',
            6 => 'passingTouchdowns',
            7 => 'sacked',
            8 => 'passerRating',
        ]
    ];

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

        $position = $this->extractPlayerPosition($crawler);
        $player->setPosition($position);

        $name = $this->extractPlayerName($crawler);
        $player->setName($name);

        $seasons = $this->buildSeasonDataFromCrawler($crawler);
        $player->setSeasons($seasons);

        return $player;
    }

    private function buildSeasonDataFromCrawler(Crawler $crawler): array
    {
        $playerSeasons = [];
        $dataTables = $crawler->filter('table.data');
        foreach ($dataTables as $dataTable) {
            $tableCrawler = new Crawler($dataTable);
            $title = $tableCrawler->filter('tr.title');
            if ((!$title->count()) > 0) {
                continue;
            }
            // Check that this particular table type can be parsed, by checking DATATABLE_PARSER_MAP
            if (!array_key_exists($title->text(), self::DATATABLE_PARSER_MAP)) {
                continue;
            }

            $rows = $tableCrawler->filter('tr')->slice(2, -1);

            foreach($rows as $row) {
                $rowCrawler = new Crawler($row);
                $cells = $rowCrawler->filter('td');
                $season = (int)substr($cells->first()->text(), 0, 4);
                // Ensure season exists in array
                $playerSeasons[$season] = $playerSeasons[$season] ?? ['year' => $season];
                $i = 0;
                foreach($cells->slice(1) as $cell) {
                    $key = self::DATATABLE_PARSER_MAP[$title->text()][$i];
                    $playerSeasons[$season][$key] = $cell->textContent;
                    $i++;
                }
            }
        }

        $normalizers = [new ArrayDenormalizer(), new ObjectNormalizer()];
        $serializer = new Serializer($normalizers);

        foreach($playerSeasons as &$playerSeason) {
            $playerSeason = $serializer->denormalize($playerSeason, PlayerSeason::class);
        }

        return $playerSeasons;
    }

    private function extractPlayerName(Crawler $crawler): string
    {
        $crawler->filter('div.name h1 span:not(.firstName)')->each(function(Crawler $crawler) {
            foreach($crawler as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        return trim($crawler->filter('div.name h1')->text());
    }

    private function extractPlayerPosition(Crawler $crawler): string
    {
        $positionElement = $crawler->filter('div.name h1 span.playerPosition');
        return $positionElement->text();
    }
}
