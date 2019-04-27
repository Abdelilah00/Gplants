<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Command;
use App\CommandDetails;
use App\User;

class CommandsController extends Controller
{

    public function store(Request $request){

        $this->validate($request, [
            //User Table
            'lastName' => 'required',
            'firstName' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',

            //Command Table
            'adresse' => 'required',
        ]);

        $user = new User();
        $user->FisrtName = $request->fistName;
        $user->LastName = $request->lastName;
        $user->FisrtName = $request->fistName;
        $user->CIN = $request->cin;
        $user->PhoneNumber = $request->phoneNumber;
        $user->Email = $request->email;
        $user->save();

        $command = new Command();
        $command->Adresse = $request->adresse;
        $command->UserId = $user->UserId;
        $command->user()->associate($user);
        $command->save();

        $items = \Cart::getContent();

        foreach ($items as $item){
            $commandDetails = new CommandDetails();
            $commandDetails->CommandId = $command->CommandId;
            $commandDetails->ProductId = $item->id;
            $commandDetails->Qte = $item->quantity;
            $commandDetails->command()->associate($commandDetails);
            $commandDetails->save();
        }

        //Send the command by email

        \Cart::clear();
        return redirect('/')->with('success', 'Order Terminate');
    }
}
