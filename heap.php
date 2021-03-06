<?php

$hs = new HeapSort();
$array = array(9,8,7,6,5,4,3,2,1,0,10,1000,0);
$hs->sort($array);
for($i=0;$i<count($array);$i++)
{
    echo $array[$i].',';
}

class HeapSort{

    function create(&$array, $i, $t)
    {
        $tmp_var = $array[$i];    
        $j = $i * 2 + 1;

        while ($j <= $t)  
        {
            if($j < $t)
            if($array[$j] < $array[$j + 1]) 
            {
                $j = $j + 1; 
            }
            if($tmp_var < $array[$j]) 
            {
                $array[$i] = $array[$j];
                $i = $j;
                $j = 2 * $i + 1;
            } 
            else 
            {
                $j = $t + 1;
            }
        }
        $array[$i] = $tmp_var;
    }

    function sort(&$array) 
    {
        $init = (int)floor((count($array) - 1) / 2);
        for($i=$init; $i >= 0; $i--)
        {
            $count = count($array) - 1;
            $this->create($array, $i, $count);
        }

        for ($i = (count($array) - 1); $i >= 1; $i--)  
        {
            $tmp_var = $array[0];
            $array [0] = $array [$i];
            $array [$i] = $tmp_var;
            $this->create($array, 0, $i - 1);
        }
    }
}
?>