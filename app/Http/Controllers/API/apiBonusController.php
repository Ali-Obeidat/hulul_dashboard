<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use Illuminate\Http\Request;

class apiBonusController extends Controller
{
    public function create(Request $request)
    {
        
       $bonus = new Bonus();
       $bonus->code = $request->code;
       $bonus->quantity = $request->quantity;
       $bonus->from = $request->from;
       $bonus->to = $request->to;
       $bonus->save();
        return 'Bonus Added Successfully';
      
    }

    public function update(Request $request, $id)
    {
        $bonus = Bonus::find($id);
        $bonus->code = $request->code;
        $bonus->quantity = $request->quantity;
        $bonus->from = $request->from;
        $bonus->to = $request->to;
        $bonus->save();
        return 'Bonus Edited Successfully';
        
    }

    public function destroy($id)
    {
        $bonus = Bonus::find($id);
        $bonus->delete();
        return 'Bonus Deleted ';
       
    }
}
