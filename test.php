<?php

(Array) $stockPricesYesterday = [11, 7, 5, 8, 9, 10, 7];

$detail = getMaxProfitMethod1($stockPricesYesterday);
//$detail = getMaxProfitMethod2($stockPricesYesterday);

print_r($detail);

/**
 * Straight away get the min price and min index and get max price for remaining value in array
 */
function getMaxProfitMethod1($stockPricesYesterday)
{
    $minPrice = min($stockPricesYesterday);
    $maxPrice = 0;
    $minIndex = array_search($minPrice, $stockPricesYesterday);

    for ($i = $minIndex + 1; $i < count($stockPricesYesterday); $i++) {

        if ($maxPrice < $stockPricesYesterday[$i]) {
            $maxPrice = $stockPricesYesterday[$i];
        }
    }

    return [
        'buyPrice' => $minPrice,
        'sellPrice' => $maxPrice,
        'maxProfit' => $maxPrice - $minPrice
    ];
}

/**
 * check each value in array and return max profit
 */
function getMaxProfitMethod2($stockPricesYesterday)
{
    $minPrice = $stockPricesYesterday[0];
    $maxPrice = 0;
    $maxProfit = $maxPrice - $minPrice;

    for ($i = 0; $i < count($stockPricesYesterday); $i++) {

        if ($minPrice > $stockPricesYesterday[$i]) {
            $minPrice = $stockPricesYesterday[$i];
        }

        if ($maxPrice < $stockPricesYesterday[$i + 1]) {
            $maxPrice = $stockPricesYesterday[$i + 1];
        }

        $currentProfit = $maxPrice - $minPrice;

        if ($currentProfit > $maxProfit) {
            $maxProfit = $currentProfit;
        }
    }

    return [
        'buyPrice' => $minPrice,
        'sellPrice' => $maxPrice,
        'maxProfit' => $maxProfit
    ];
}
