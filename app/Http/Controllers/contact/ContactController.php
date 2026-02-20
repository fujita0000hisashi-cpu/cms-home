<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
	public function index()
	{
		return view('contact.index');
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
		return view('contact.confirm', compact('validated'));
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
		$contact->status  = '未対応';
		$contact->memo    = '';
    $contact->save();

    return view('contact.send', ['contact' => $contact]);
	}
}
