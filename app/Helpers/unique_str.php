<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

if (!function_exists('unique_str')) {
    /*
     *
     * Generate unique (%99.9) string
     *
     * @param int $char  - length of the unique string
     * @param     $table - name of the table
     * @param     $col   - name of the column that needs to be checked
     *
     * @return string
     */
    function unique_str($char, $table = null, $col = null): string {
        $unique = false;
        $attempts = 0;
        $str = "";

        while (!$unique && $attempts < 15) {
            $str = Str::random($char);

            if ($table != null & $col != null) {
                $unique = !DB::table($table)->where($col, $str)->exists();
            }
            else $unique = true;

            $attempts++;
        }

        if ($attempts > 15) {
            return $char . rand(100, 500) . "-str-couldnt-generated-" . rand(10,50);
        }

        return $str;
    }
}
