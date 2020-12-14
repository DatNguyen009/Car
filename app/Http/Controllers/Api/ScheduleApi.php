<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\buycar;
use App\Models\User;



class ScheduleApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = buycar::all(); 
        $user = User::select('username', 'customer','address','SDT')->get();
        $newProducts = $products->map(function($products, $key) use($user){
           
            return [
                "prod_id" => $products->prod_id,
               
                "email" => $products->email,
                "inforPersonal" => $user->filter(function($user) use($products) {
                    return $user->username == $products->email;  
                }),
                
                "IsBuy" => $products->IsBuy,
                "appointmentSchedule" => $products->appointmentSchedule,
                "BuyDate" => $products->BuyDate,
            ];
        });
        return \response()->json($newProducts, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return buycar::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = buycar::where('prod_id',$id)->get();
        if (\is_null($product)) {
            return response()->json(['message' => 'khong tim thay record'], 404);
        } else {        
            return \response()->json($product, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return buycar::update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return buycar::delete();

    }
}
