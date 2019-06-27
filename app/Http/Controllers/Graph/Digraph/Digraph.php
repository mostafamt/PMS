<?php

namespace App\Http\Controllers\Graph\Digraph;

/**
 * Class Digraph
 * @package topologicalSort
 */
class Digraph
{
    /** @var int $v */
    private $v;
    /** @var int $e */
    private $e;
    /** @var array $adjList */
    private $adjList;
    /**
     * Digraph constructor.
     * @param int $v
     */
    public function __construct(int $v)
    {
        $this->v = $v;
        $this->e = 0;
        $this->adjList = array_fill(0, $this->v, []);
    }
    /**
     * @return int
     */
    public function V(): int
    {
        return $this->v;
    }
    /**
     * @return int
     */
    public function E(): int
    {
        return $this->e;
    }
    /**
     * @param int $v
     * @param int $w
     */
    public function addEdge(int $v, int $w): void
    {
        $this->adjList[$v][] = $w;
        $this->e++;
    }
    /**
     * @param int $v
     * @return array
     */
    public function adj(int $v): array
    {
        return $this->adjList[$v];
    }
    /**
     * @return Digraph
     */
    public function reverse(): Digraph
    {
        $r = new static($this->v);
        foreach ($this->adjList as $i => $v) {
            foreach ($v as $w) {
                $r->addEdge($w, $i);
            }
        }
        return $r;
    }
    /**
     * @return string
     */
    public function __toString(): string
    {
        $s = $this->v . ' vertices , ' . $this->e . ' edges' . PHP_EOL;
        foreach ($this->adjList as $i => $v) {
            $s .= $i . ' :' . implode(' ', $v) . PHP_EOL;
        }
        return $s;
    }
}
