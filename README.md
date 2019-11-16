# CBS NCAA Stats Scraper

This PHP package scrapes stats for a college football player from CBS.

[![Build Status](https://travis-ci.com/danabrey/cbs-ncaa-stats-scraper.svg?branch=master)](https://travis-ci.com/danabrey/cbs-ncaa-stats-scraper)

## Installation

Via Composer:

`composer require danabrey/cbs-ncaa-stats-scraper`

## Usage

Scrape a player's stats by passing their CBS player ID (found in the URL e.g. `https://www.cbssports.com/collegefootball/players/playerpage/2741201/jerry-jeudy`)

```$php
$scraper = new DanAbrey\CBSNCAAStatsScraper\Scraper();
$stats = $scraper->getPlayerStats(2741201);
```

The return from `getPlayerStats` will be a `Player` object, which includes their ID, name and a `seasons` property which is an array of `PlayerSeason` objects, containing the stats for the player that season.

## Disclaimer

Scraping from websites without permission may be against Terms of Service. Use this package at your own discretion.

## Contributing/Contact

Please feel free to raise issues or open pull requests with suggestions on how to improve this project. For any informal questions, find me on Twitter at [@danabrey](https://www.twiter.com/danabrey).

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2019 © Dan Abrey
