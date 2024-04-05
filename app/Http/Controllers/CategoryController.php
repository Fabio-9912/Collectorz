<?php

namespace App\Http\Controllers;

use App\Models\Category;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
 {
    $this->middleware('auth')->except('show');
 }    public function show (Category $category) {

        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        return view('categories.show', compact('category', 'result'));
    }
}
