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
        $this->htmlResponse = file_get_contents('./tests/fixtures/jerry-jeudy.html');
    }

    public function test_can_extract_name()
    {
        $crawler = new Crawler();
        $html = $this->htmlResponse;
        $crawler->addHtmlContent($html);
        $this->assertEquals('Jerry Jeudy', $this->playerCrawler->extractPlayerName($crawler));
    }

    public function test_can_extract_position()
    {
        $crawler = new Crawler();
        $html = $this->htmlResponse;
        $crawler->addHtmlContent($html);
        $this->assertEquals('WR', $this->playerCrawler->extractPlayerPosition($crawler));
    }

    public function test_can_extract_college()
    {
        $crawler = new Crawler();
        $html = $this->htmlResponse;
        $crawler->addHtmlContent($html);
        $this->assertEquals('Alabama Crimson Tide', $this->playerCrawler->extractPlayerCollege($crawler));
    }

    public function test_can_extract_season_stats()
    {
        $crawler = new Crawler();
        $html = $this->htmlResponse;
        $crawler->addHtmlContent($html);
        /** @var PlayerSeason[] $seasons */
        $seasons = $this->playerCrawler->buildSeasonDataFromCrawler($crawler);
        $this->assertIsArray($seasons);
        $this->assertArrayHasKey(2017, $seasons);
        $this->assertArrayHasKey(2018, $seasons);
        $this->assertArrayHasKey(2019, $seasons);

        $this->assertInstanceOf(PlayerSeason::class, $seasons[2017]);

        $this->assertSame(2019, $seasons[2019]->getYear());
        $this->assertSame('Alabama', $seasons[2019]->getTeam());
        $this->assertSame(9, $seasons[2019]->getGamesPlayed());
        $this->assertSame(57, $seasons[2019]->getReceptions());
        $this->assertSame(753, $seasons[2019]->getReceivingYards());
    }

    public function throws_exception_when_player_not_found()
    {
        // Placeholder for test to be created when exception implemented
        $this->assertEquals(true, true);
    }
}
