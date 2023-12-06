<?php

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

if (! function_exists('paginateFromArray')) {
    /**
     * paginateFromArray
     */
    function paginateFromArray($items, $page = null, $perPage = 20, $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
function uploadImage($file)
{
    $name = 'parking-' . time();

    return Cloudinary::upload($file->getRealPath(), [
        'folder' => 'parkings',
        'public_id' => $name,
    ])->getSecurePath();
}

function deleteImage($image)
{
    $url_image = explode('/', $image);
    $image = end($url_image);
    $image_id = current(explode('.', $image));
    Cloudinary::destroy('parkings/' . $image_id);
}
