<?php

/**
 * Convert the numerical value to currency format
 * @param float $value
 * @return string
 */
function toCurrencyFormat(float $value)
{
    return sprintf("%s %s", $_ENV['CURRENCY_TAG'], number_format($value, 2));
}

/**
 * Converts the timestamp value to date format
 * @param $timestamp
 * @return false|string
 */
function toDate($timestamp): string
{
    return date('Y-m-d', strtotime($timestamp));
}

/**
 * Converts the timestamp value to date-time format
 * @param $timestamp
 * @return string
 */
function toDateTime($timestamp): string
{
    return date('Y-m-d g:i:s a', strtotime($timestamp));
}


function cleanErrorMessagesBuffer()
{
    $_SESSION['_MESSAGES']['_ERRORS'] = [];
}