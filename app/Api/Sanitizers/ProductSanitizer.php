<?php namespace Api\Sanitizers;

class ProductSanitizer extends BaseSanitizer
{
    public function sanitize($data)
    {
        $trim = [
            'merchant_id', 'category_id',
            'code', 'title', 'description',
            'price', 'stock_quantity',
            'min_order_quantity', 'weight',
        ];

        foreach($trim as $field)
        {
            if(isset($data[$field]))
                $data[$field] = trim($data[$field]);
        }

        return $data;
    }
}