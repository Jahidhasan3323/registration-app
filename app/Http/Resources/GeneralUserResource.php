<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class GeneralUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'     => $this->id,
            'name'     => $this->name,
            'email'    => $this->email,
            'address'  => $this->address,
            'photo'    => Storage::disk('public')->url("/{$this->photo}"),
            'cv'       => Storage::disk('public')->url("/{$this->cv}"),
            'division' => new DivisionResource($this->division),
            'district' => new DistrictResource($this->district),
            'upazila'  => new UpazilaResource($this->upazila),
            'created_at'  => $this->created_at,
        ];
    }
}
