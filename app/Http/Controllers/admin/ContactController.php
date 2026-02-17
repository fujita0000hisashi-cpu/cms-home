<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
	public function showContacts()
	{
		$contacts = Contact::paginate(2);
    $title = 'お問い合わせ一覧';
		return view('admin.contact.index', compact('contacts', 'title'));
	}

	public function edit($id) {
		$title = 'お問い合わせ詳細';
		$contact = Contact::findOrFail($id);
		return view('admin.contact.edit', compact('contact', 'title'));
	}

	public function update(Request $request, Contact $contact)
	{
		$validated = $request->validate(([
			'status' => ['required'],
			'memo' => ['sometimes', 'nullable', 'string']
		]));

		// 空文字送信時に Laravel の ConvertEmptyStringsToNul で null になる。
		// これを防ぐため memo は null を ''に変換する。
		if(array_key_exists('memo', $validated)) {
			$validated['memo'] = $validated['memo'] ?? '';
		}
		$contact->update($validated);

    return back()->with('success', '更新が完了しました。');
	}
}
