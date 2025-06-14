<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $orderLine->id }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style type="text/css" media="screen">
        html {
            font-family: sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            font-size: 10px;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4,
        .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
        }

        .table.table-items td {
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mb-5 {
            margin-bottom: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        * {
            font-family: "DejaVu Sans";
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .total-amount {
            font-size: 12px;
            font-weight: 700;
        }

        .border-0 {
            border: none !important;
        }

        .cool-gray {
            color: #6B7280;
        }

        .redeemed {
            color: #FF0000
        }
        .available {
            color:rgb(11, 131, 31)
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @if($orderLine->logo)
    <img src="{{ $invoice->getLogo() }}" alt="logo" height="100">
    @endif

    <table class="table mt-5">
        <tbody>
            @foreach($orderLine->vouchers as $voucher)
            <tr>
                <td class="border-0 pl-0" width="50%">
                    @if ($voucher->is_redeemed)
                    <img src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->color(255,0,0)->size(200)->generate('VOID')) }}">
                    @else
                    <img src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(200)->generate($voucher->code)) }}">
                    @endif
                    <p class="cool-gray">
                        <strong>{{ $voucher->code }}</strong>
                    </p>
                </td>
                <td class="border-0 pl-0">
                    <p>Event: <strong>{{ $voucher->event->name }}</strong></p>
                    <p>Venue: <strong>{{ $voucher->venue->title }}</strong></p>
                    <p>Service Time: <strong>{{ $orderLine->service_time->title }}</strong></p>
                    @if ($voucher->is_redeemed)
                    <h4 class="text-uppercase redeemed">
                        <strong>ALREADY USED</strong>
                    <p class="redeemed">at Venue: <strong>{{ $voucher->redemption_venue?->title }}</strong></p>
                    <p class="redeemed">Redeemed at: <strong>{{ ($voucher->redemption_date) }}</strong></p>

                    </h4>
                    @else
                        <h4 class="text-uppercase available">
                        <strong>Redeemable at the venue</strong>
                    </h4>
                    @endif

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>



    <script type="text/php">
        if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "{{ __('invoices::invoice.page') }} {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
</body>

</html>