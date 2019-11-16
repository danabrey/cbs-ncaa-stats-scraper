<?php

use DanAbrey\CBSNCAAStatsScraper\PlayerSeason;
use DanAbrey\CBSNCAAStatsScraper\Scraper;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class ScraperTest extends TestCase
{
    /**
     * @var Scraper
     */
    private $scraper;
    /**
     * @var string
     */
    private $htmlResponse;

    protected function setUp(): void
    {
        $this->scraper = new Scraper();
        $this->htmlResponse = file_get_contents('./tests/fixtures/jerry-jeudy.html');
    }

    private function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public function test_can_extract_name()
    {
        $crawler = new Crawler();
        $html = $this->htmlResponse;
        $crawler->addHtmlContent($html);
        $name = $this->invokeMethod($this->scraper, 'extractPlayerName', [$crawler]);
        $this->assertEquals('Jerry Jeudy', $name);
    }

    public function test_can_extract_position()
    {
        $crawler = new Crawler();
        $html = $this->htmlResponse;
        $crawler->addHtmlContent($html);
        $position = $this->invokeMethod($this->scraper, 'extractPlayerPosition', [$crawler]);
        $this->assertEquals('WR', $position);
    }

    public function test_can_extract_season_stats()
    {
        $crawler = new Crawler();
        $html = $this->htmlResponse;
        $crawler->addHtmlContent($html);
        /** @var PlayerSeason[] $seasons */
        $seasons = $this->invokeMethod($this->scraper, 'buildSeasonDataFromCrawler', [$crawler]);
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
