<?php

namespace App\Transformers\Api;

use Illuminate\Database\Eloquent\Collection;

class StudentTransformer extends Transformer
{
    /**
     * Transform one student.
     *
     * @param  array $student
     * @return array
     */
    public function transform($student)
    {
        return [
            'id' => $student['id'],
            'name' => $student['name'],
            'email' => $student['email'],
        ];
    }
}