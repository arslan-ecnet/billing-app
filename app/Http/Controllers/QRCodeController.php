<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function qrCodePrint($id)
    {
        $product = Product::findOrFail($id);
        $qrCodes = [];
        for ($i = 0; $i < $product->quantity; $i++) {
            $qrCodes[] = base64_encode(
                QrCode::format('png')->size(120)->generate($product->custom_id)
            );
        }
        $pdf = Pdf::loadView('pdf.qrcodes', compact('product', 'qrCodes'))
            ->setPaper('a4', 'portrait');
        return $pdf->download($product->name . ' ' . $product->size . '.pdf');
    }
}
