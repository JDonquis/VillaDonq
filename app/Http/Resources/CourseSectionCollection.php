<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseSectionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        $response = [];
        foreach ($this as $courseSection) 
        {   
            $response[$courseSection->course_id][] = [$courseSection->section_id => $courseSection->section->name];
        }

        $response = json_encode($response);
        $response = json_decode($response);

        return $response;
    }
}
