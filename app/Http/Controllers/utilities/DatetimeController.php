<?php

namespace App\Http\Controllers\utilities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatetimeController extends Controller
{
    public function setDateTimeTH($results, $index='updated_at'){
        foreach ($results as $key => $value) {
        $results[$key][$index.'_th'] = date("d/m/Y H:i:s", strtotime('+543 years', strtotime($value[$index])));
        }

        return $results;
    }
}
