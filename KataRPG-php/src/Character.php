<?php

namespace App;

class Character
{
    private int $health;
    private int $level;
    private bool $alive; 

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true; 
    }

    public function getHealth(): int
    {
        if ($this->health>1000)
        {
            return 1000; 
        }

        return $this->health;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function isAlive(): bool
    {
        if ($this->health<=0) 
        {
            $this->alive = false; 
        }

        return $this->alive; 
    }

    public function attacks(int $damaged, $character)
    {
        if($this !== $character) 
        {
            $character->health-=$damaged; 
            return ($level);
        }
    }

    public function curar(int $value, $character)
    {
        if ($this->health>0) 
        {
            $character->health+=$value; 
        } 

        elseif ($this === $character)
        {
            return $this->health; 
        }
    }

}
