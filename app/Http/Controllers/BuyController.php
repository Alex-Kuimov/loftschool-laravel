<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class BuyController extends Controller
{
    public function sell(Request $request)
    {
        $id = $request->input('id');
        $user = $request->user();
        $product = Buy::productFromOrders($id);
        $error = [];
        $name = trim(htmlspecialchars($request->input("name")));
        $product_id = trim(htmlspecialchars($request->input("id")));
        $email = trim(htmlspecialchars($request->input("email")));

        if (empty($name)) {
            $error[] = "Введите имя";
        }
        if (empty($email)) {
            $error[] = "Введите email";
        }
        if (empty($error)) {
            Buy::orderInsert($product_id, $email, $name);
            $successful[] = "Ваш заказ принят";
//            $transport = new Swift_SmtpTransport('smtp.mail.ru', 465);
//            $transport->setUsername('user');
//            $transport->setPassword('password');
//            $transport->setEncryption('SSL');
//            $mailer = new Swift_Mailer($transport);
//            $message = new Swift_Message();
//            $message->setSubject("Заказ в Геймсмаркете");
//            $message->setFrom(['fromMail' => 'fromMail']);
//            $message->addTo('toMail', 'toMail');
//            $message->setBody("Пользователь с email " . $email . " , заказал игру с id - " . $product_id);
//            $mailer->send($message);
            return redirect()->route('successful');
        }

        return view('buy',
            ['id' => $id,
                'product' => $product,
                'user' => $user,
                'error' => $error
            ]
        );
    }

    public function buy(Request $request)
    {
        $id = $request->input('id');
        $user = $request->user();
        $product = Buy::productFromOrders($id);

        return view('buy',
            ['id' => $id,
                'product' => $product,
                'user' => $user]
        );
    }
}
