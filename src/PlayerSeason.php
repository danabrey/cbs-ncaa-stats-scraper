<?php
namespace DanAbrey\CBSNCAAStatsScraper;

class PlayerSeason
{
    public int $year;
    public string $team;
    public int $gamesPlayed = 0;
    public int $rushingAttempts = 0;
    public int $rushingYards = 0;
    public int $rushingTouchdowns = 0;
    public int $receptions = 0;
    public int $receivingYards = 0;
    public int $receivingTouchdowns = 0;
    public int $puntReturns = 0;
    public int $puntReturnYards = 0;
    public int $puntReturnTouchdowns = 0;
    public int $puntReturnLong = 0;
    public int $kickoffReturns = 0;
    public int $kickoffReturnYards = 0;
    public int $kickoffReturnTouchdowns = 0;
    public int $kickoffReturnLong = 0;
    public int $fumbles = 0;
    public int $fumblesLost = 0;
    public int $passingAttempts = 0;
    public int $passingCompletions = 0;
    public int $passingYards = 0;
    public int $passingInterceptions = 0;
    public int $passingTouchdowns = 0;
    public int $sacked = 0;
    public string $passerRating = '0.0';
}
