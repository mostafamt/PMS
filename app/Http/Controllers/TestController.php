<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Graph\Digraph\Topological ;
use App\Http\Controllers\Graph\Digraph\Digraph ;

class TestController extends Controller
{
    //

    public function test()
    {
        $v = 13 ;
        $digraph = new Digraph($v);

        $digraph->addEdge(0,1);
        $digraph->addEdge(0,6);
        $digraph->addEdge(0,5);
        $digraph->addEdge(2,0);
        $digraph->addEdge(2,3);
        $digraph->addEdge(3,5);
        $digraph->addEdge(5,4);
        $digraph->addEdge(6,4);
        $digraph->addEdge(6,9);
        $digraph->addEdge(7,6);
        $digraph->addEdge(8,7);
        $digraph->addEdge(9,10);
        $digraph->addEdge(9,11);
        $digraph->addEdge(9,12);
        $digraph->addEdge(11,12);
        // $digraph->addEdge(2,1);

        $topo = new Topological($digraph);
        $a = $topo->order();
        for($i = 0 ; $i < count($a);$i++){
            echo $a[$i].' ';
        }
        echo '<br>' ;
        $status = $topo->isDAG();
        echo '<br>';
        echo $status.'<br>';
        if( $status ){
            echo 'cyclic graph<br>';
        } else {
            echo 'ACyclic graph<br>';
        }
        // $graph = $digraph->__toString();
    }
}
