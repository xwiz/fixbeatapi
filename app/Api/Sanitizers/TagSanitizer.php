<?php namespace Api\Sanitizers;

class TagSanitizer extends BaseSanitizer
{
    public function sanitize($data)
    {
        if(isset($data['tag_name']))
            $data['tag_name'] = trim($data['tag_name']);

        return $data;
    }
}