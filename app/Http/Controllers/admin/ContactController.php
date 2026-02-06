<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

	public function confirm(Request $request)
	{
		$validated = $request->validate([
			'company'  => 'required|string|max:20',
			'name'     => 'required|string|max:20',
			'phone'    => 'required|regex:/^[0-9-]+$/',
			'mail'     => 'required|email',
			'birthday' => 'required',
			'sex'      => 'required',
			'job'      => 'required',
			'contact'  => 'required|string',
		]);
		return view('admin.contact.confirm', compact('validated'));
	}

	public function send(Request $request)
	{
		$contact = new Contact();
    $contact->company  = $request->company;
    $contact->name     = $request->name;
		$contact->phone    = $request->phone;
		$contact->mail     = $request->mail;
		$contact->birthday = $request->birthday;            
    $contact->sex      = $request->sex;
    $contact->job      = $request->job;    
    $contact->contact  = $request->contact;
    $contact->save();

    return view('admin.contact.send', ['contact' => $contact]);
	}
}
