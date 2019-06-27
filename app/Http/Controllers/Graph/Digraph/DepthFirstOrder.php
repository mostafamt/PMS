<?php

namespace App\Http\Controllers\Graph\Digraph;

/**
 * Class DepthFirstOrder
 * @package Digraph
 */
class DepthFirstOrder
{
    /** @var array $marked */
    private $marked = [];
    /** @var array $pre */
    private $pre = [];
    /** @var array $post */
    private $post = [];
    /** @var array $reversePost */
    private $reversePost = [];
    /**
     * DepthFirstOrder constructor.
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
    public function dfs(Digraph $g, int $v): void
    {
        // echo 'v = ' . $v . PHP_EOL;
        $this->pre[] = $v;
        $this->marked[$v] = true;
        foreach ($g->adj($v) as $w) {
            if (empty($this->marked[$w])) {
                $this->dfs($g, $w);
            }
        }
        $this->post[] = $v;
        array_unshift($this->reversePost, $v);
    }
    /**
     * @return array
     */
    public function pre(): array
    {
        return $this->pre;
    }
    /**
     * @return array
     */
    public function post(): array
    {
        return $this->post;
    }
    /**
     * @return array
     */
    public function reversePost(): array
    {
        return $this->reversePost;
    }
}
