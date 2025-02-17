<?php

namespace App\Http\Controllers;

class PaymentController extends Controller
{
    public function payVnpay()
    {
        if(isset($_POST['redirect'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            // $tongtien = $_POST['sotien'];
            $vnp_TmnCode = "NJJ0R8FS"; //Website ID in VNPAY System
            $vnp_HashSecret = "BYKJBHPPZKQMKBIBGGXIYKWYFAYSJXCW"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl ="http://127.0.0.1:8000/order_confirmation";
            $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
            //Config input format
            //Expire
            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
    
            //thanh toan bang vnpay
            $vnp_TxnRef = time() . ""; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
            $vnp_OrderType = 'billpayment';
    
            $vnp_Amount = 1000000;
            $vnp_Locale = 'en';
            $vnp_BankCode = 'INT';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    
            $vnp_ExpireDate = $expire;
    
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $vnp_ExpireDate
    
            );
    
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            // }
    
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
    
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                print_r($returnData);
            }
        
            
        } elseif(isset($_POST['payUrl'])) {
            

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Content-type: text/html; charset=utf-8');
            
                // Hàm thực thi POST request
                function execPostRequest($url, $data)
                {
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    ]);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                    $result = curl_exec($ch);
                    curl_close($ch);
                    return $result;
                }
            
                // Thông tin API MoMo
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            
                // Thông tin đơn hàng
                $orderInfo = "Thanh toán qua mã QR MoMo";
                $amount = 1000 * 100; // Số tiền thanh toán (total)
                $orderId = time(); // Mã đơn hàng
                $redirectUrl = "http://localhost:8000/account-dashboard";
                $ipnUrl = "http://127.0.0.1:8000/order_confirmation";
                $extraData = ""; // Dữ liệu thêm
            
                // Thông tin request
                $requestId = time();
                $requestType = "captureWallet";
            
                // Chuỗi rawHash để ký HMAC SHA256
                $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$requestId&requestType=$requestType";
            
                // Tạo chữ ký (signature)
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
            
                // Tạo dữ liệu gửi đi
                $data = [
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                ];
            
                // Gửi request đến API MoMo
                $result = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);
            
                // Kiểm tra phản hồi từ API
                if (isset($jsonResult['payUrl'])) {
                    // Điều hướng đến trang thanh toán
                    header('Location: ' . $jsonResult['payUrl']);
                } else {
                    // Hiển thị lỗi nếu không có `payUrl`
                    echo "API Response Error:<br>";
                    print_r($jsonResult);
                }
                exit;
            }
        }
    }
} 