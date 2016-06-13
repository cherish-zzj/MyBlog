<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            //添加文章字段验证规则
            'title' => 'required|min:2',
            'content_raw'=> 'required',
            'published_at'=> 'required|date',
            
        ];
    }
}
