<?php

use DanAbrey\CBSNCAAStatsScraper\Crawler\PlayerCrawler;
use DanAbrey\CBSNCAAStatsScraper\PlayerSeason;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class PlayerCrawlerTest extends TestCase
{
    /**
     * @var PlayerCrawler
     */
    private $playerCrawler;
    /**
     * @var string
     */
    private $htmlResponse;

    protected function setUp(): void
    {
        $this->playerCrawler = new PlayerCrawler();
    }

    public function players()
    {
        return [
            [
                file_get_contents('./tests/fixtures/george-pickens.html'),
                'George Pickens',
                'WR',
                'Georgia Bulldogs',
                [2019, 2020],
            ],
            [
            file_get_contents('./tests/fixtures/bijan-robinson.html'),
                'Bijan Robinson',
                'RB',
                'Texas Longhorns',
                [2020],
            ],
        ];
    }

    /**
     * @dataProvider players
     * @param $html
     * @param $name
     * @param $position
     * @param $college
     * @param $seasons
     */
    public function test_can_extract_name($html, $name, $position, $college, $seasons)
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        $this->assertEquals($name, $this->playerCrawler->extractPlayerName($crawler));
    }

    /**
     * @dataProvider players
     * @param $html
     * @param $name
     * @param $position
     * @param $college
     * @param $seasons
     */
    public function test_can_extract_position($html, $name, $position, $college, $seasons)
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        $this->assertEquals($position, $this->playerCrawler->extractPlayerPosition($crawler));
    }

    /**
     * @dataProvider players
     * @param $html
     * @param $name
     * @param $position
     * @param $college
     * @param $seasons
     */
    public function test_can_extract_college($html, $name, $position, $college, $seasons)
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        $this->assertEquals($college, $this->playerCrawler->extractPlayerCollege($crawler));
    }

    /**
     * @dataProvider players
     * @param $html
     * @param $name
     * @param $position
     * @param $college
     * @param $seasons
     */
    public function test_can_extract_seasons($html, $name, $position, $college, $seasons)
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        /** @var PlayerSeason[] $crawledSeasons */
        $crawledSeasons = $this->playerCrawler->buildSeasonDataFromCrawler($crawler);
        $this->assertIsArray($crawledSeasons);

        foreach($seasons as $season) {
            $this->assertArrayHasKey($season, $crawledSeasons);
            $this->assertInstanceOf(PlayerSeason::class, $crawledSeasons[$season]);
        }
    }

    public function test_can_extract_season_data()
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent(file_get_contents('./tests/fixtures/george-pickens.html'));
        /** @var PlayerSeason[] $crawledSeasons */
        $crawledSeasons = $this->playerCrawler->buildSeasonDataFromCrawler($crawler);

        $this->assertSame(2019, $crawledSeasons[2019]->getYear());
        $this->assertSame('Georgia', $crawledSeasons[2019]->getTeam());
        $this->assertSame(12, $crawledSeasons[2019]->getGamesPlayed());
        $this->assertSame(49, $crawledSeasons[2019]->getReceptions());
        $this->assertSame(727, $crawledSeasons[2019]->getReceivingYards());
    }

    public function throws_exception_when_player_not_found()
    {
        // Placeholder for test to be created when exception implemented
        $this->assertEquals(true, true);
    }
}
