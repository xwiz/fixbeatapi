<?php namespace Api\Sanitizers;

class MallSanitizer extends BaseSanitizer
{
    public function sanitize($data)
    {
        if(isset($data['some']))
            $data['some'] = trim($data['some']);

        return $data;
    }
}