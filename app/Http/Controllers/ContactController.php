<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private ContactService $contactService;

    /**
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function getContacts()
    {
        $contacts = Contact::all();
        return $contacts;
    }

    public function saveContacts(Request $request)
    {
        $contact = new Contact;

        $this->contactService->addContact($contact, $request->all());

        if ($contact->save()) {
            return response()->json(['status' => true, 'message' => 'Contact Added Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'There is some problem. Please try again']);
        }
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);

        if ($contact->delete()) {
            return response()->json(['status' => true, 'message' => 'Contact Deleted Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong. Please try again']);
        }
    }

    public function contactDetail($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }


    public function updateContact(Request $request, $id)
    {
        $contact = Contact::where('id', $id)->first();
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

        if ($contact->save()) {
            return response()->json(['status' => true, 'message' => 'Contact Updated Successfully']);
        }

        return response()->json(['status' => false, 'message' => 'There is some problem. Please try again']);

    }

    public function userProjects($id)
    {
        /** @var User $user */
        $user = User::find($id);

        $projects = $user->projects;

        return response()->json($projects);
    }

}
