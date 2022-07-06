<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{

    public function addContact(Contact $contact, array $data)
    {
        if ($request->has('image') && !empty($request->image)) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/gallery'), $imageName);
            $path = ('public/images/gallery/' . $imageName);
            $contact->image = $path;
        }

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->bio = $request->bio;
        $contact->contact_no = $request->contact_no;
    }

}
