<?php

namespace App\Http\Controllers;

use App\Models\Pix\Payload;
use Illuminate\Http\Request;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;


class PixController extends Controller
{
    public function index() {
        $obPayload = (new Payload())->setPixKey("0000011111")
                            ->setDescription("Pagamento do pedido 1234")
                            ->setMerchantName("Costa")
                            ->setMerchantCity("SP")
                            ->setAmount(100.00)
                            ->setTxid("WFDSF111");

        $payloadQrCode = $obPayload->getPayload();

        $obQrCode = new QrCode($payloadQrCode);

        $image = (new Output\Png)->output($obQrCode, 400);

        return view("index", ['image' => $image]);
    }
}
