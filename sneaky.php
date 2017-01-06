<?php
/*******************************************************
 * Author:  Sam Ma ( Taiwan / Taipei )
 * EMAIL:   pttsamma@gmail.com
 * Updated: 2017 Jun
 *
 * Brief Description:
 * It is a single file PHP script. Which can sneaky redirct
 * visitors back to index while the page they visited consist some keywords
 *******************************************************/


/* ----------------------------------------------------------------
 * Settings
   ---------------------------------------------------------------- */

// Keywords which Want to be Sneaky Redirect (擋訪問的關鍵字名單)
$keywords = [
    'keyword 1',
    'keyword 2',
    'keyword 3',
];

// Domain of Current Site (本站Domain)
$siteDomain = 'http://www.booklife.tw';



/* ----------------------------------------------------------------
 * Page Crawling
   ---------------------------------------------------------------- */

// Disable Time Limit (Keep the Script Running)
set_time_limit(0);

// Crawl Target Page (目標頁面)
$targetURL = $siteDomain . $_GET[url];
$html = file_get_contents($targetURL);

// Searching Keywords in Target Page (目標頁面是否存在關鍵字)
for ($i = 0; $i <= count($keywords); $i++) {
    if (strpos($html, $keywords[$i]) !== false) {

        // Redirect to Site Index if Keyword Exsists. (如果關鍵字存在頁面中，導向首頁)
        header('Location: '.$siteDomain);
        return;
    }
}

// Display Page if No Keyword Exists (內容無關鍵字，則輸出目標頁面)
echo ($html);
