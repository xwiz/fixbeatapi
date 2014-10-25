<?php namespace Api\ResponseFormat;

use Dingo\Api\Http\ResponseFormat\JsonResponseFormat as Format;

class JsonResponseFormat extends Format
{
    /**
     * Encode the content to its JSON representation.
     * We are overwriting original method because we don't want forward slashes to be escaped
     *
     * @param  string  $content
     * @return string
     */
    protected function encode($content)
    {
        return json_encode($content, JSON_UNESCAPED_SLASHES);
    }
}
