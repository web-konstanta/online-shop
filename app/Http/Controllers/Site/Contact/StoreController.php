<?php

namespace App\Http\Controllers\Site\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Models\Contact;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);
        return redirect('/contact')->with('success', 'Сообщение успешно отправлено!');
    }
}
