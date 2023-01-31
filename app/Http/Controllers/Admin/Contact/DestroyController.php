<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index');
    }
}
