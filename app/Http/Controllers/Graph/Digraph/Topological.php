<?php

namespace App\Http\Controllers\Graph\Digraph;

/**
 * Class Topological
 * @package Digraph
 */
class Topological
{
    /** @var array */
    private $order;
    /**
     * Topological constructor.
     * @param Digraph $g
     */
    public function __construct(Digraph $g)
    {
        $cycleFinder = new DirectedCycle($g);
        if (!$cycleFinder->hasCycle()) {
            $dfs = new DepthFirstOrder($g);
            $this->order = $dfs->reversePost();
        }
    }
    /**
     * @return array
     */
    public function order(): array
    {
        return $this->order;
    }
    /**
     * @return bool
     */
    public function isDAG(): bool
    {
        return $this->order === null;
    }
}
