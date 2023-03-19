<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <!-- Scripts -->
        <script src="{{ public_path('/js/app.js') }}"></script>
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

        <style>
            body {
                font-family: "MS Mincho", "ＭＳ 明朝";
            }
            table {
                width: 100%;
            }
            table.detail tr {
                height: 50px;
            }
            .page {
                page-break-after: always;
                page-break-inside: avoid;
                height: 100%;
            }
            .page:last-child{
                page-break-after: auto;
            }
            .pdf-flex-box{
                display: table !important;
                width: 100% !important;
            }
            .pdf-cell{
                display: table-cell !important;
            }
            .col-12{
                width: 100% !important;
            }
            .col-11 {
                width: 92% !important;
            }
            .col-10{
                width: 83% !important;
            }
            .col-9{
                width: 75% !important;
            }
            .col-8{
                width: 66% !important;
            }
            .col-6{
                width: 60% !important;
            }
            .col-4{
                width: 33% !important;
            }
            .col-3{
                width: 25% !important;
            }
            .col-2{
                width: 26% !important;
            }
            .col-1{
                width: 8% !important;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="page">
            <div class="row pdf-flex-box pt-4">
                <div class="ml-auto" style="width: 15%">
                    <span>NO.</span><span>{{ $header->no }}</span>
                </div>
                <div class="ml-auto" style="width: 15%">
                    <span>{{ date('Y年m月d日') }}</span>
                </div>
            </div>
            <div class="row pdf-flex-box mt-4 mb-3">
                <div class="mx-auto" style="width: 18%;">
                    <span class="text-center"><p class="h3">{{ $title }}</p></span>
                </div>
            </div>
            <table class="table table-borderless">
                <tr>
                    <td style="width: 55%;">
                        <div class="row pdf-flex-box mb-4">
                            <div class="col-1 pdf-cell text-nowrap">
                                <span>ご住所：</span>
                            </div>
                            <div class="col-11 pdf-cell">
                                <span>{{ $header->to_company_address }}</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box mb-4">
                            <div class="col-1 pdf-cell text-nowrap">
                                <span>ご芳名：</span>
                            </div>
                            <div class="col-11">
                                <span>{{ $header->to_company_name }}</span><span>御中</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box mb-4">
                            <div class="col-12 pdf-cell">
                                <span>（得意先コード：</span><span>{{ $header->to_vendor_code }}</span></span>）</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box mb-4">
                            <div class="col-4 pdf-cell"></div>
                            <div class="col-8 pdf-cell">
                                <span>下記の通りご請求申し上げます。</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box mb-4">
                            <div class="col-4 pdf-cell"></div>
                            <div class="col-8 pdf-cell">
                                <u><span class="h4">ご請求金額：</span><span class="h4">{!! str_replace(' ', '&nbsp;', str_pad('\\' . number_format($header->amount), 13, ' ', STR_PAD_LEFT)) !!}</span></u>
                            </div>
                        </div>
                        <div class="row pdf-flex-box">
                            <div class="col-12 pdf-cell">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center"><span>税率別内訳</span></th>
                                            <th class="text-center"><span>税抜金額</span></th>
                                            <th class="text-center"><span>消費税</span></th>
                                            <th class="text-center"><span>税込金額</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-right"><span>10％対象</span></th>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-right"><span>軽減8%対象</span></th>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row pdf-flex-box">
                            <div class="col-12 pdf-cell">
                                <span>※上記の小計には課税対象取引のみを表示しております。</span>
                            </div>
                        </div>
                    </td>
                    <td style="width: 45%;">
                        <table>
                            <tr>
                                <td>
                                    <div class="row pdf-flex-box mb-3">
                                        <div class="col-12 pdf-cell">
                                            <span>{{ $header->from_address1 }}</span>
                                        </div>
                                    </div>
                                    <div class="row pdf-flex-box mb-3">
                                        <div class="col-12 pdf-cell">
                                            <span>{{ $header->from_address2 }}</span>
                                        </div>
                                    </div>
                                    <div class="row pdf-flex-box">
                                        <div class="col-12 pdf-cell">
                                            <span>{{ $header->from_company_name }}</span>
                                            @empty($invoice_no)
                                            @else
                                            <span>（{{ $invoice_no }}）</span>
                                            @endempty
                                        </div>
                                    </div>
                                    <div class="row pdf-flex-box">
                                        <div class="col-12 pdf-cell">
                                            <span>{{ $header->from_company_division }}</span>
                                            <span>（{{ '0000000' }}）</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="{!!  $imgSrc !!}" height="130" width="130" loading="lazy">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class="row pdf-flex-box mb-3">
                            <div class="col-12 pdf-cell">
                                <span>{{ '田中　太郎' }}</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box mb-3">
                            <div class="col-12 pdf-cell">
                                <span>問い合わせ先TEL：</span><span>{{ $header->from_company_tel }}</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box">
                            <div class="col-12 pdf-cell">
                                <span>下記の口座にお振込みください。</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box">
                            <div class="col-3 pdf-cell text-nowrap">
                                <span>銀　　　行：</span>
                            </div>
                            <div class="col-9 pdf-cell">
                                <span>{{ $header->from_bank_name }}</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box">
                            <div class="col-3 pdf-cell text-nowrap">
                                <span>　　　　　　</span>
                            </div>
                            <div class="col-9 pdf-cell">
                                <span>{{ $header->from_branch_name }}</span>
                            </div>
                        </div>
                        <div class="row pdf-flex-box">
                            <div class="col-3 pdf-cell text-nowrap">
                                <span>口　　　座：</span>
                            </div>
                            <div class="col-9 pdf-cell">
                                <span>{{ $header->from_bank_kind }}</span><span>{{ $header->from_bank_no }}</span>
                            </div>
                        </div>
                        </div>
                        <div class="row pdf-flex-box">
                            <div class="col-3 pdf-cell text-nowrap">
                                <span>口座名義人：</span>
                            </div>
                            <div class="col-9 pdf-cell">
                                <span>{{ $header->from_account_name }}</span>
                            </div>
                        </div>
                    </td>
                    {{-- <td style="width: 12%;">
                        <table border="2" cellspacing="0">
                            <col>
                            <col style="width: 10px;">
                            <tr>
                                <td>　</td><td style="writing-mode: vertical-rl;">承認者印</td>
                            </tr>
                            <tr>
                                <td>　</td><td style="writing-mode: vertical-rl;">発行者印</td>
                            </tr>
                        </table>
                    </td> --}}
                </tr>
            </table>
        </div>
        <div class="footer">
            <div class="row pdf-flex-box">
                <div class="col-12">
                    @php
                        $payment = new Carbon\Carbon($header->payment_date)
                    @endphp
                    <span>入金日は</span><span>{{ $payment->format('Y年m月') }}</span><span>までになっておりますので、よろしくお願いいたします。</span>
                </div>
            </div>
            <div class="row pdf-flex-box">
                <div class="col-12">
                    <table class="table detail">
                        <col style="width: 15%;">
                        <col style="width: 65%;">
                        <col style="width: 5%;">
                        <col style="width: 15%;">
                        <tr>
                            <td class="align-middle text-center"><span>取引年月日</span></td>
                            <td class="align-middle"><span>明　　細</span></td>
                            <td class="align-middle text-center"><span>税%</span></td>
                            <td class="align-middle text-center"><span>金　額</span></td>
                        </tr>
                        @php
                        $count = 0;
                        @endphp
                        @for($i = 0;$i < 13; $i++)
                            @if(isset($details[$i]))
                            <tr>
                                <td class="text-center"><span>{{ $details[$i]->purchase_date }}</span></td>
                                <td><span>{{ $details[$i]->detail_summary }}</span></td>
                                <td class="text-center">
                                    <span>
                                        @switch($details[$i]->tax_rate)
                                            @case(10)
                                            @case(8)
                                                {{ $details[$i]->tax_rate . '%' }}
                                                @break
                                            @default
                                                {{ '不' }}
                                                @break
                                        @endswitch
                                    </span>
                                </td>
                                <td class="text-right"><span>{{ number_format($details[$i]->amount) }}</span></td>
                            </tr>
                            @else
                                @switch($count++)
                                    @case(0)
                                        <tr>
                                            <td colspan="3"><span>消費税</span></td>
                                            <td class="text-right"><span>{{ number_format($summary['tax']) }}</span></td>
                                        </tr>
                                        @break
                                    @case(1)
                                        <tr>
                                            <td colspan="3"><span>合　計</span></td>
                                            <td class="text-right"><span>{{ number_format($summary['amount']) }}</span></td>
                                        </tr>
                                        @break
                                    @default
                                        <tr>
                                            <td colspan="4" style="border: none;"><span></span></td>
                                        </tr>
                                        @break
                                @endswitch
                            @endif
                        @endfor
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
