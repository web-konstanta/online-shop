<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\Contact;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Contact $contact)
    {
        $data = $request->validated();
        $contact->update($data);
        return redirect()->route('admin.contacts.index');
    }
}
