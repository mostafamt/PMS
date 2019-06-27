<?php

namespace App\Http\Controllers\Graph\Digraph;

/**
 * Class DirectedCycle
 * @package Digraph
 */
class DirectedCycle
{
    /** @var array $marked */
    private $marked = [];
    /** @var array $edgeTo */
    private $edgeTo = [];
    /** @var array $cycle */
    private $cycle;
    /** @var array $onStack */
    private $onStack = [];
    /**
     * DirectedCycle constructor.
     * @param Digraph $g
     */
    public function __construct(Digraph $g)
    {
        for ($i = 0; $i < $g->V(); $i++) {
            if (empty($this->marked[$i])) {
                $this->dfs($g, $i);
            }
        }
    }
    /**
     * @param Digraph $g
     * @param int $v
     */
    private function dfs(Digraph $g, int $v): void
    {
        $this->onStack[$v] = true;
        $this->marked[$v] = true;
        foreach ($g->adj($v) as $w) {
            if ($this->hasCycle()) {
                return;
            }
            if(empty($this->marked[$w])) {
                $this->edgeTo[$w] = $v;
                $this->dfs($g, $w);
            } else if(!empty($this->onStack[$w])) {
                $this->cycle = [];
                for($x = $v; $x !== $w; $x = $this->edgeTo[$x]) {
                    array_unshift($this->cycle, $x);
                }
                array_unshift($this->cycle, $w, $v);
            }
        }
        $this->onStack[$v] = false;
    }
    /**
     * @return bool
     */
    public function hasCycle(): bool
    {
        return $this->cycle !== null;
    }
    /**
     * @return array
     */
    public function cycle(): array
    {
        return $this->cycle;
    }
}
