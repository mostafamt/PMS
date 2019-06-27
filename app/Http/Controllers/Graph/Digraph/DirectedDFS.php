<?php

namespace App\Http\Controllers\Graph\Digraph;

/**
 * Class DirectedDFS
 * @package Digraph
 */
class DirectedDFS
{
    /** @var array */
    private $marked;
    /**
     * DirectedDFS constructor.
     * @param Digraph $g
     * @param $source
     */
    public function __construct(Digraph $g, $source)
    {
        if (is_array($source)) {
            foreach ($source as $s) {
                if (empty($this->marked[$s])) {
                    $this->dfs($g, $s);
                }
            }
        } else {
            $this->dfs($g, $source);
        }
    }
    /**
     * @param Digraph $g
     * @param int $v
     */
    public function dfs(Digraph $g, int $v): void
    {
        $this->marked[$v] = true;
        foreach ($g->adj($v) as $w) {
            if (empty($this->marked[$w])) {
                $this->dfs($g, $w);
            }
        }
    }
    /**
     * @param int $v
     * @return bool
     */
    public function marked(int $v): bool
    {
        return $this->marked[$v];
    }
}
