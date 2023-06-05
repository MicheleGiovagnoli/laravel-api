<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'name' => 'required',
                'emial' => 'email',
                'message' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response(
                [
                    'success' => false,
                    'errors' => $validator->errors()
                ]
            );
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        $oggettoNewContact = new NewContact($newLead);

        Mail::to('mikgiov1@gmail.com')->send($oggettoNewContact);

        return response()->json(
            [
                'success' => true
            ]
        );
    }
}
