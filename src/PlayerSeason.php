<?php
namespace DanAbrey\CBSNCAAStatsScraper;

class PlayerSeason
{
    /**
     * @var int
     */
    private $year;

    /**
     * @var string
     */
    private $team;

    /**
     * @var int
     */
    private $gamesPlayed = 0;

    /**
     * @var int
     */
    private $rushingAttempts = 0;

    /**
     * @var int
     */
    private $rushingYards = 0;

    /**
     * @var int
     */
    private $rushingTouchdowns = 0;

    /**
     * @var int
     */
    private $receptions = 0;

    /**
     * @var int
     */
    private $receivingYards = 0;

    /**
     * @var int
     */
    private $receivingTouchdowns = 0;

    /**
     * @var int
     */
    private $puntReturns = 0;

    /**
     * @var int
     */
    private $puntReturnYards = 0;

    /**
     * @var int
     */
    private $puntReturnTouchdowns = 0;

    /**
     * @var int
     */
    private $puntReturnLong = 0;

    /**
     * @var int
     */
    private $kickoffReturns = 0;

    /**
     * @var int
     */
    private $kickoffReturnYards = 0;

    /**
     * @var int
     */
    private $kickoffReturnTouchdowns = 0;

    /**
     * @var int
     */
    private $kickoffReturnLong = 0;

    /**
     * @var int
     */
    private $fumbles = 0;

    /**
     * @var int
     */
    private $fumblesLost = 0;

    /**
     * @var int
     */
    private $passingAttempts = 0;

    /**
     * @var int
     */
    private $passingCompletions = 0;

    /**
     * @var int
     */
    private $passingYards = 0;

    /**
     * @var int
     */
    private $passingInterceptions = 0;

    /**
     * @var int
     */
    private $passingTouchdowns = 0;

    /**
     * @var int
     */
    private $sacked = 0;

    /**
     * @var string
     */
    private $passerRating = '0.0';

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getTeam(): string
    {
        return $this->team;
    }

    /**
     * @param string $team
     */
    public function setTeam(string $team): void
    {
        $this->team = $team;
    }

    /**
     * @return int
     */
    public function getGamesPlayed(): int
    {
        return $this->gamesPlayed;
    }

    /**
     * @param int $gamesPlayed
     */
    public function setGamesPlayed(int $gamesPlayed): void
    {
        $this->gamesPlayed = $gamesPlayed;
    }

    /**
     * @return int
     */
    public function getRushingAttempts(): int
    {
        return $this->rushingAttempts;
    }

    /**
     * @param int $rushingAttempts
     */
    public function setRushingAttempts(int $rushingAttempts): void
    {
        $this->rushingAttempts = $rushingAttempts;
    }

    /**
     * @return int
     */
    public function getRushingYards(): int
    {
        return $this->rushingYards;
    }

    /**
     * @param int $rushingYards
     */
    public function setRushingYards(int $rushingYards): void
    {
        $this->rushingYards = $rushingYards;
    }

    /**
     * @return int
     */
    public function getRushingTouchdowns(): int
    {
        return $this->rushingTouchdowns;
    }

    /**
     * @param int $rushingTouchdowns
     */
    public function setRushingTouchdowns(int $rushingTouchdowns): void
    {
        $this->rushingTouchdowns = $rushingTouchdowns;
    }

    /**
     * @return int
     */
    public function getReceptions(): int
    {
        return $this->receptions;
    }

    /**
     * @param int $receptions
     */
    public function setReceptions(int $receptions): void
    {
        $this->receptions = $receptions;
    }

    /**
     * @return int
     */
    public function getReceivingYards(): int
    {
        return $this->receivingYards;
    }

    /**
     * @param int $receivingYards
     */
    public function setReceivingYards(int $receivingYards): void
    {
        $this->receivingYards = $receivingYards;
    }

    /**
     * @return int
     */
    public function getReceivingTouchdowns(): int
    {
        return $this->receivingTouchdowns;
    }

    /**
     * @param int $receivingTouchdowns
     */
    public function setReceivingTouchdowns(int $receivingTouchdowns): void
    {
        $this->receivingTouchdowns = $receivingTouchdowns;
    }

    /**
     * @return int
     */
    public function getPuntReturns(): int
    {
        return $this->puntReturns;
    }

    /**
     * @param int $puntReturns
     */
    public function setPuntReturns(int $puntReturns): void
    {
        $this->puntReturns = $puntReturns;
    }

    /**
     * @return int
     */
    public function getPuntReturnYards(): int
    {
        return $this->puntReturnYards;
    }

    /**
     * @param int $puntReturnYards
     */
    public function setPuntReturnYards(int $puntReturnYards): void
    {
        $this->puntReturnYards = $puntReturnYards;
    }

    /**
     * @return int
     */
    public function getPuntReturnTouchdowns(): int
    {
        return $this->puntReturnTouchdowns;
    }

    /**
     * @param int $puntReturnTouchdowns
     */
    public function setPuntReturnTouchdowns(int $puntReturnTouchdowns): void
    {
        $this->puntReturnTouchdowns = $puntReturnTouchdowns;
    }

    /**
     * @return int
     */
    public function getPuntReturnLong(): int
    {
        return $this->puntReturnLong;
    }

    /**
     * @param int $puntReturnLong
     */
    public function setPuntReturnLong(int $puntReturnLong): void
    {
        $this->puntReturnLong = $puntReturnLong;
    }

    /**
     * @return int
     */
    public function getKickoffReturns(): int
    {
        return $this->kickoffReturns;
    }

    /**
     * @param int $kickoffReturns
     */
    public function setKickoffReturns(int $kickoffReturns): void
    {
        $this->kickoffReturns = $kickoffReturns;
    }

    /**
     * @return int
     */
    public function getKickoffReturnYards(): int
    {
        return $this->kickoffReturnYards;
    }

    /**
     * @param int $kickoffReturnYards
     */
    public function setKickoffReturnYards(int $kickoffReturnYards): void
    {
        $this->kickoffReturnYards = $kickoffReturnYards;
    }

    /**
     * @return int
     */
    public function getKickoffReturnTouchdowns(): int
    {
        return $this->kickoffReturnTouchdowns;
    }

    /**
     * @param int $kickoffReturnTouchdowns
     */
    public function setKickoffReturnTouchdowns(int $kickoffReturnTouchdowns): void
    {
        $this->kickoffReturnTouchdowns = $kickoffReturnTouchdowns;
    }

    /**
     * @return int
     */
    public function getKickoffReturnLong(): int
    {
        return $this->kickoffReturnLong;
    }

    /**
     * @param int $kickoffReturnLong
     */
    public function setKickoffReturnLong(int $kickoffReturnLong): void
    {
        $this->kickoffReturnLong = $kickoffReturnLong;
    }

    /**
     * @return int
     */
    public function getFumbles(): int
    {
        return $this->fumbles;
    }

    /**
     * @param int $fumbles
     */
    public function setFumbles(int $fumbles): void
    {
        $this->fumbles = $fumbles;
    }

    /**
     * @return int
     */
    public function getFumblesLost(): int
    {
        return $this->fumblesLost;
    }

    /**
     * @param int $fumblesLost
     */
    public function setFumblesLost(int $fumblesLost): void
    {
        $this->fumblesLost = $fumblesLost;
    }

    /**
     * @return int
     */
    public function getPassingAttempts(): int
    {
        return $this->passingAttempts;
    }

    /**
     * @param int $passingAttempts
     */
    public function setPassingAttempts(int $passingAttempts): void
    {
        $this->passingAttempts = $passingAttempts;
    }

    /**
     * @return int
     */
    public function getPassingCompletions(): int
    {
        return $this->passingCompletions;
    }

    /**
     * @param int $passingCompletions
     */
    public function setPassingCompletions(int $passingCompletions): void
    {
        $this->passingCompletions = $passingCompletions;
    }

    /**
     * @return int
     */
    public function getPassingYards(): int
    {
        return $this->passingYards;
    }

    /**
     * @param int $passingYards
     */
    public function setPassingYards(int $passingYards): void
    {
        $this->passingYards = $passingYards;
    }

    /**
     * @return int
     */
    public function getPassingInterceptions(): int
    {
        return $this->passingInterceptions;
    }

    /**
     * @param int $passingInterceptions
     */
    public function setPassingInterceptions(int $passingInterceptions): void
    {
        $this->passingInterceptions = $passingInterceptions;
    }

    /**
     * @return int
     */
    public function getPassingTouchdowns(): int
    {
        return $this->passingTouchdowns;
    }

    /**
     * @param int $passingTouchdowns
     */
    public function setPassingTouchdowns(int $passingTouchdowns): void
    {
        $this->passingTouchdowns = $passingTouchdowns;
    }

    /**
     * @return int
     */
    public function getSacked(): int
    {
        return $this->sacked;
    }

    /**
     * @param int $sacked
     */
    public function setSacked(int $sacked): void
    {
        $this->sacked = $sacked;
    }

    /**
     * @return string
     */
    public function getPasserRating(): string
    {
        return $this->passerRating;
    }

    /**
     * @param string $passerRating
     */
    public function setPasserRating(string $passerRating): void
    {
        $this->passerRating = $passerRating;
    }

}
