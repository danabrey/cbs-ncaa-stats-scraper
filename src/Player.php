<?php
namespace DanAbrey\CBSNCAAStatsScraper;

class Player
{
    public int $id;
    public string $name;
    public string $position;
    public string $college;
    public array $seasons = [];
}
