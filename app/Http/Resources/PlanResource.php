<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->plan_name,
            'date_time'=> $this->date_time,
            'spray_density'=> $this->spray_density,
            'plan_description' => $this->plan_description,
        ];
    }
}
