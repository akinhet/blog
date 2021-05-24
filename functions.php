<?php
    function substrwords($text, $maxchar, $end='...') {
        if (mb_strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);      
            $output = '';
            $i      = 0;
            while (1) {
                $length = mb_strlen($output)+mb_strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } 
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } 
        else {
            $output = $text;
        }
        return $output;
    }
?>
