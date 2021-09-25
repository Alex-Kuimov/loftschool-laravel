<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Buy;
use Illuminate\Http\Request;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class BuyController extends Controller
{
    public function sell(Request $request, Buy $model)
    {

       $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
       ]);

        $name = $request->input("name");
        $product_id = $request->input("id");
        $email = $request->input("email");


        $user = $request->user();
        $product = Product::find($product_id);
        $error = [];

        if (empty($name)) {
            $error[] = "Введите имя";
        }

        if (empty($email)) {
            $error[] = "Введите email";
        }

        if (empty($error)) {
            $model::create([
                'product_id' => $product_id,
                'email' => $email,
                'name' => $name,
            ]);

            $successful[] = "Ваш заказ принят";

            /*
            $transport = new Swift_SmtpTransport('smtp.mail.ru', 465);
            $transport->setUsername('user');
            $transport->setPassword('password');
            $transport->setEncryption('SSL');
            $mailer = new Swift_Mailer($transport);
            $message = new Swift_Message();
            $message->setSubject("Заказ в Геймсмаркете");
            $message->setFrom(['fromMail' => 'fromMail']);
            $message->addTo('toMail', 'toMail');
            $message->setBody("Пользователь с email " . $email . " , заказал игру с id - " . $product_id);
            $mailer->send($message);
            */

            return redirect()->route('successful');
        }

        return view('buy',
            ['id' => $product_id,
                'product' => $product,
                'user' => $user,
                'error' => $error
            ]
        );
    }

    public function buy(Request $request, Product $model)
    {
        $id = $request->input('id');
        $user = $request->user();
        $product = $model::find($id);

        return view('buy',
            ['id' => $id,
                'product' => $product,
                'user' => $user]
        );
    }
}
