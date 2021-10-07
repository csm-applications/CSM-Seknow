<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserAccountResource;
use App\Models\UserAccount;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $employees = $this->whenLoaded("worksIn");
        return [
            'id_company' => $this->id_company,
            'name' => $this->name,
            'phone' => $this->phone,
            'foundation_date' => $this->foundation_date,
            'Description' => $this->Description,
            'owner' => UserAccount::where("id_user_account", $this->employees)->get(),
            'employees' => UserAccountResource::collection(UserAccount::where('worksIn',$this->owner)->get())
        ];
    }
}
