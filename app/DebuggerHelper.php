<?php

namespace App;

class DebuggerHelper
{
    private static $_initialMemory;
    private static $_initialTime;
    private static $_finalMemory;
    private static $_finalTime;
    private static $_messages;
    /**
     * Start a New Recording
     *
     * Do record Memory usage and time from this point
     * with given id with default as -1
     *
     * @param string $id The id of current record
     *
     * @see endRecording() To end it
     * @see endRecording() To get Report
     *
     * @return void
     */
    public static function startRecording($id = -1)
    {
        DebuggerHelper::$_initialMemory[$id] = memory_get_usage();
        DebuggerHelper::$_initialTime[$id] = microtime(true);
    }

    /**
     * Add additional msg to a  Recording
     *
     * @param string $msg The id of current record
     * @param string $id  The id of current record
     *
     * @return void
     */
    public static function addMsg($msg, $id = -1)
    {
        if (!isset(DebuggerHelper::$_messages[$id])) {
            DebuggerHelper::$_messages[$id] = "";
        }
        DebuggerHelper::$_messages[$id] .= $msg;
    }

    /**
     * End a Record
     *
     * @param string $id The id of current record
     *
     * @return void
     */
    public static function endRecording($id = -1)
    {
        DebuggerHelper::$_finalMemory[$id] = memory_get_usage();
        DebuggerHelper::$_finalTime[$id]  = microtime(true);
    }

    /**
     * End a The Last Started Recording
     *
     * @param string $id The id of current record
     *
     * @return string The allocated memory size and time execution between
     *                the call of 2 function method start and end
     */
    public static function getReport($id = -1)
    {
        return "<br>my id is '" . $id . "'  ,messages: {"
            . (isset(DebuggerHelper::$_messages[$id]) ?
                DebuggerHelper::$_messages[$id]."<br>" : "")
            . "} Computed memory is " . (DebuggerHelper::$_finalMemory[$id]
                - DebuggerHelper::$_initialMemory[$id]) / 1024 / 1024
            . " MB and computed time is " . (DebuggerHelper::$_finalTime[$id]
                - DebuggerHelper::$_initialTime[$id])
            . " seconds";
    }

    /**
     * End now and get report
     *
     * @param string $id The id of current record
     *
     * @return string The allocated memory size and time execution between
     *                the call of 2 function method start and end
     */
    public static function pingReport($id = -1)
    {
        DebuggerHelper::endRecording($id);
        return DebuggerHelper::getReport($id);
    }

    /**
     * End now and get Time difference
     *
     * @param string $id The id of current record
     *
     * @return int The spent time
     */
    public static function pingTime($id = -1)
    {
        DebuggerHelper::endRecording($id);
        return (DebuggerHelper::$_finalTime[$id]
            - DebuggerHelper::$_initialTime[$id]);
    }

    /**
     * Helper function to clear all data
     *
     * @return void
     */
    public static function clearMemory()
    {
        DebuggerHelper::$_finalMemory = array();
        DebuggerHelper::$_initialMemory = array();
        DebuggerHelper::$_finalTime = array();
        DebuggerHelper::$_initialTime = array();
        DebuggerHelper::$_messages = array();
    }
}
