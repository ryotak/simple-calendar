<?php
$inputYear = $argv[1];
$inputMonth = $argv[2];

createCalendar($inputYear, $inputMonth);

function createCalendar (int $year, int $month) {
    $day = 1;
    $header = 'Sun|Mon|Tue|Wed|Thu|Fri|Sat|';
    $satday = 6;    // 土曜日は6

    // ヘッダ出力
    echo $header . PHP_EOL;

    // 1日の曜日を取得
    $weekDayOf1st = date("w", mktime(0, 0, 0, $month, 1, $year));

    // 空白出力
    for ($i = 1; $i <= $weekDayOf1st; $i++) {
        echo '    ';
    }

    // 日付かどうか判断して出力
    while (checkdate($month, $day, $year)) {
        echo sprintf( "%3s", $day ) . '|';

        // 土曜日で週が終わる
        if (date("w", mktime(0, 0, 0, $month, $day, $year)) == $satday) {
            // 週を終了したときに改行
            echo PHP_EOL;
        }

        $day++;
    }

    // 最後に改行
    echo PHP_EOL;
}