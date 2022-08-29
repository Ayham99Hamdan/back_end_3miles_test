<?php

namespace App\Http\Controllers\Api;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressSearchResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    /**
     * search address
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request){
        $query = Address::query();

        // chekc if search value is empty
        if($request->has('search_value') && empty($request->search_value))
            return JsonResponse::success(null , 200 , JsonResponse::MSG_SUCCESS);

        $query->where('landmark' , 'like' , '%' . $request->search_value . '%')
            ->orWhere('street_name' , 'like' , '%' . $request->search_value . '%')
            ->orWhere('street_number' , 'like' , '%' . $request->search_value . '%');

        return JsonResponse::success(AddressSearchResource::collection($query->get()) , 200 , JsonResponse::MSG_SUCCESS);


    }
}
