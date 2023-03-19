<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/asset', function () {
//     $options = [
//         'margin-top' => 5,
//         'margin-right' => 0,
//         'margin-bottom' => 0,
//         'margin-left' => 0,
//         'disable-smart-shrinking' => true,
//         'zoom' => 1.59
//     ];

//     $pdf = PDF::loadView('assetc')
//         ->setOption($options);
//     return $pdf->download();
// });
// Route::get('/asset/view', function () {
//     return view('assetc');
// });
Route::get('/invoice', function () {
    $options = [
        'load-media-error-handling' => 'abort',
        'margin-right' => 5,
        'margin-left' => 5,
        'margin-top' => 0,
        'footer-left' => '[page] / [toPage]',
        'footer-right' => '[isodate] [time]',
        'user-style-sheet' => public_path('css\app.css'),
        'footer-font-name' => 'MS Mincho'
    ];

    $header = App\Header::inRandomOrder()->first();
    $detailModel = $header->details;

    $details = [];
    $details2 = [];
    $summary = [
        'amount' => 0,
        'tax' => 0
    ];
    foreach($detailModel as $key => $detail){
        $summary['amount'] += $detail->amount;
        $summary['tax'] += $detail->amount * 0.1;
        if($key < 13){
            $details[] = $detail;
        }else{
            $details2[] = $detail;
        }
    }

    $pages[] = view('invoice', [
        'title' => '請求書',
        'header' => $header,
        'details' => $details,
        'summary' => $summary,
        'invoice_no' => 'T0000000000000',
        'imgSrc' => public_path('/images/shaban.png'),
    ])->render();
    if(count($details) > 11){
        $count = 13 - count($details);
        $pages[] = view('invoice2', [
            'header' => $header,
            'details' => $details2,
            'summary' => $summary,
            'count' => $count
        ])->render();
        $pages[] = view('invoice', [
            'title' => '請求書（副）',
            'header' => $header,
            'details' => $details,
            'summary' => $summary,
            'imgSrc' => public_path('/images/shaban.png'),
        ])->render();
        $pages[] = view('invoice2', [
            'header' => $header,
            'details' => $details2,
            'summary' => $summary,
            'count' => $count
        ])->render();
    }else{
        $pages[] = view('invoice', [
            'title' => '請求書（副）',
            'header' => $header,
            'details' => $details,
            'summary' => $summary,
            'imgSrc' => public_path('/images/shaban.png'),
        ])->render();
    }

    $pdf = PDF::loadHTML($pages)
        ->setOptions($options);
    return $pdf->download();
});
Route::get('/invoice/view', function () {
    $header = App\Header::inRandomOrder()->first();
    $detailModel = $header->details;

    $details = [];
    $details2 = [];
    $summary = [
        'amount' => 0,
        'tax' => 0
    ];
    foreach($detailModel as $key => $detail){
        if($key < 12){
            $details[] = $detail;
        }else{
            $details2[] = $detail;
        }
    }

    return view('invoice', [
        'title' => '請求書',
        'header' => $header,
        'details' => $details,
        'summary' => $summary,
        'imgSrc' => public_path('images\syaban.png'),
        // 'invoice_no' => 'aaa'
    ]);
});
