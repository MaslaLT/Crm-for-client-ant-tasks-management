<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 11/5/2018
 * Time: 6:54 PM
 */

// Converting minutes from DB to Hours and minutes
if(!function_exists('min_to_hours')) {
    function min_to_hours($minutesFromDb)
    {
        $convertedTimeInHours = intval($minutesFromDb / 60);
        $convertedTimeInMinutes = intval($minutesFromDb % 60);
        $convertedMinutesAndHours = $convertedTimeInHours .'h '. $convertedTimeInMinutes .'min';
        return $convertedMinutesAndHours;
    }
}

// Calculating Unfinished tasks
if(!function_exists('unfinished_tasks')) {
    function unfinished_tasks($allTasks)
    {
        $countedAllTasks = count($allTasks);
        $finishedTasks = $countedAllTasks;

        foreach ($allTasks as $task){
            if($task['status_id'] == 3){
                $finishedTasks = $countedAllTasks - 1;
            }
        }

        return $finishedTasks;
    }
}