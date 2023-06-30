<?php

namespace App\Http\Controllers\FOU;

use App\Http\Controllers\Controller;
use App\Models\FOU\Availability;
use App\Models\FOU\FieldDetailled;
use App\Models\FOU\Unavailability;
use DateTime;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index()
    {
        Storage::delete();
        return view('FOU\empty');
    }
}
