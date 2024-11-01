<?php

namespace App\Http\Resources;

use App\Models\Customer\CustomerPackage;
use App\Models\Customer\SubscriptionTransaction;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        $subscriped = \App\Models\SubscriptionTransaction::where('status' , 'success' )
        ->where( 'customer_id' , $this->id  )
        //->where( 'start_date' , '<=' , Carbon::now()->format('Y-m-d') )
        ->where( 'end_date' , '>=' , Carbon::now()->format('Y-m-d') )
        ->first();

        if(!empty($subscriped ) ){
            $is_subscriped = true ;
             $package_name = request()->header('lang') == 'ar' ? $subscriped->package->name_ar : $subscriped->package->name_en ,

        }else{
            $is_subscriped = false ;
            $package_name = null ;
        }

    

        return [
            'customer_id' => $this->id,

            'first_name' => $this->first_name ?? '',
            'last_name' => $this->last_name ?? '',
 
            'is_subscriped' => $is_subscriped ,
            'start_date' =>  !empty($subscriped) ? $subscriped->start_date  : null,
            'end_date' =>   !empty($subscriped) ? $subscriped->end_date  : null,
            'package' =>    $package_name,
           
            'phone' => $this->phone,
          
            'email' => $this->email ,

            'state' => $this->state_id ,
            'city' => $this->city_id ,

            'image' => $this->image? asset($this->image) : null ,
            'delivery_address_type' => $this->delivery_address_type,
            'handle_delivery_type' => $this->handle_delivery_type,
            'street' => $this->street,
            'avenue' => $this->avenue,
            'block' => $this->block,
            'home_number' => $this->home_number,
            'building_number' => $this->building_number,
            'floor' => $this->floor,
            'office_number' => $this->office_number,
            'apartment_number' => $this->apartment_number,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,

        ];
    }
}
