<?php namespace Api\Sanitizers;

class UserSanitizer extends BaseSanitizer
{
    public function sanitize($data)
    {
        return $data;
    }
}