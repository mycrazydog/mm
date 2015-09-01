<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Sentinel;

class SourcesFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $user = Sentinel::getUser();
        // $routeID = ($this->route('profiles'));

        // return $user->id == $routeID;

        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
