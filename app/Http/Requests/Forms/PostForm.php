<?php

namespace App\Http\Requests\Forms;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostForm extends FormRequest
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
        $post = $this->getBindedModelOrCreateNew();

        return [
            'title'       => 'required|string',
            'excerpt'     => 'required',
            'body'        => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail'   => ['image', Rule::requiredIf(! $post->exists)],
        ];
    }

    public function persist()
    {
        $post = $this->getBindedModelOrCreateNew();
        $attributes = $this->validated();

        if ($this->has('thumbnail')) {
            $attributes['thumbnail'] = $this->file('thumbnail')->store('thumbnails');
        }

        if ($post->exists) {
            $post->update($attributes);
        } else {
            $this->user()->posts()->create($attributes);
        }
    }

    protected function getBindedModelOrCreateNew()
    {
        return $this->post ?? new Post;
    }
}
