<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>QR Codes</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            width: 25%; /* 4 columns */
            text-align: center;
            padding: 10px;
        }

        img {
            width: 120px;
            height: 120px;
        }
    </style>
</head>
<body>
<h3>QR Codes for Product: {{ $product->name }} (Size: {{$product->size}})</h3>

<table>
    <tr>
        @foreach($qrCodes as $i => $qr)
            <td>
                <img src="data:image/png;base64,{{ $qr }}" alt="QR Code">
            </td>

            @if(($i + 1) % 4 == 0)
    </tr>
    <tr>
        @endif
        @endforeach
    </tr>
</table>
</body>
</html>
