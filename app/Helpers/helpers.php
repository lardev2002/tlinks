<?php

if(!function_exists('convert_time_to_hours')) {
    /**
     * convert time to hours
     * @param $time
     * @return float|int
     */
    function convert_time_to_hours($time)
    {
        return (int)$time / 60;
    }
}
