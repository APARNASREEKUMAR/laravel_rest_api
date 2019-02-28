<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock == 0? 'Out of Stock' : $this->stock ,
            'discount'=>$this->discount,
            'Comment By Appu'=>'Dingluu',
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Ratings Yet',
            'reviews' => [
                'link' => url(route('reviews.index',$this->id))
            ],
        ];
    }
}
