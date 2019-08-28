<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Meals extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
            $diff_timeRequest = $request->input('diff_time') ?: 1566908224;
            $diff_time = date('Y-m-d H:i:s',$diff_timeRequest);

            $status = "created";

            if ($this->updated_at > $diff_time ) {
                $status =   "modified";
            }
            elseif($this->deleted_at > $diff_time) {
                $status = "deleted";
            }
            $meals =  [
                'id'            => $this->id,
                'title'         => $this->translate($request->input('lang'))->title,
                'description'   => $this->translate($request->input('lang'))->description,
                'status'        => $status,
            ];
           
            if ($request->input('with')) {
                $with = explode(',', $request->input('with'));
            
            if (in_array('category', $with)) {
                $meals['category'] = (new Category($this->whenLoaded('category')));
            }
            if (in_array('tags', $with)) {
                $meals['tags'] = Tags::collection($this->whenLoaded('tags'));
            }
            if (in_array('ingredients', $with)) {
                $meals['ingredients'] = Ingredients::collection($this->whenLoaded('ingredients'));
            }
        }
    
        return $meals;
    }
}
