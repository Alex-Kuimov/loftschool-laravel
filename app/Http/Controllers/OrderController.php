<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request, Buy $model)
    {
        if( count( $request->all() ) > 0 ) {
            $name = $request->input("name");
            $product_id = $request->input("id");
            $email = $request->input("email");

            $model->create([
                'name' => $name,
                'email' => $email,
                'product_id' => $product_id,
            ]);

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
    }

    public function edit(Request $request, $id, Product $model){
        $user = $request->user();
        $product = $model->findOrFail($id);

        return view('buy',
            ['id' => $id,
                'product' => $product,
                'user' => $user]
        );
    }


}
