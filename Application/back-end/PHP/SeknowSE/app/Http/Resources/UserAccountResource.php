<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Company;

class UserAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_user_account' => $this->id_user_account,
            'nome'=> $this->nome,
            'email'=> $this->email,
            'password'=> $this->password,
            'phone'=> $this->phone,
            'active'=> $this->active,
            'birth_date'=> $this->birth_date,
            'start_work'=> $this->start_work,
            'Gender'=> $this->Gender,
            'worksIn' => CompanyResource::collection(Company::where('id_company', $this->worksIn)->get())
        ];
    }
}
