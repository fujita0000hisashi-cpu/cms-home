<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
	public function showContacts()
	{
		// $contacts = Contact::All();
		$contacts = Contact::paginate(2);
    $title = 'お問い合わせ一覧';
		return view('admin.contact.index', compact('contacts', 'title'));
	}

	public function edit($id) {
		$title = 'お問い合わせ詳細';
		$contact = Contact::findOrFail($id);
		return view('admin.contact.edit', compact('contact', 'title'));
	}
}
