<?php

if(!function_exists('cutSticks'))
{
    /**
     * @param $lengths
     * @param array $output
     * @return array
     */
    function cutSticks($lengths, $output = array())
    {
        if(count($lengths) >= 1)
            array_push($output, (count($lengths) - 1));

        $min = min($lengths);

        $lengthsNew = array();

        foreach($lengths as $value)
        {
            if($value != $min)
                array_push($lengthsNew, $value - $min);
        }

        if(count($lengthsNew) == 0)
            return $output;
        else
            return cutSticks($lengthsNew, $output);

    }
}

if(!function_exists('upRights'))
{
    /**
     * @param array $upRight
     * @return int
     */
    function upRights(array $upRight)
    {
        $number = null;
        $rowColumns = array();
        $rowSize = 0;
        $colSize = 0;

        foreach ($upRight as $value)
        {
            $rowColumn = explode(' ', $value);
            if(count($rowColumn) == 1)
                $number = $rowColumn[0];
            else if(count($rowColumn) == 2) {
                if($rowSize < $rowColumn[0])
                    $rowSize = $rowColumn[0];
                if($colSize < $rowColumn[1])
                    $colSize = $rowColumn[1];
                $rowColumns[] = $rowColumn;
            }
        }

        $grid = array();

        for ($r = 0; $r < $rowSize; $r++)
        {
            $row = array();
            for ($c = 0; $c < $colSize; $c++)
            {
                array_push($row, 0);
            }
            array_push($grid, $row);
        }

        $maxValue = 0;
        $countMaxValue = 0;

        foreach ($rowColumns as $rowColumn)
        {
            for ($r = $rowSize - $rowColumn[0]; $r < $rowSize; $r++)
            {
                for($c = 0; $c < $rowColumn[1]; $c++)
                {
                    $grid[$r][$c] +=1;
                    if($maxValue < $grid[$r][$c]) {
                        $maxValue = $grid[$r][$c];
                        $countMaxValue = 0;
                    }
                    if($maxValue == $grid[$r][$c])
                        $countMaxValue++;
                }
            }

        }

        return $countMaxValue;
    }
}
