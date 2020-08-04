<?php

namespace App\Services;

class ImageService {

    public function upload($file, $path)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . uniqid() . '.' . $extension;
        request('image')->move(public_path() . '/' . $path . '/', $fileName);
        return $fileName;
    }

    public function convertBaseImageTOUrl($description,$path)
    {
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->loadHtml( mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        
        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = $path.'/' . uniqid('', true) . '.' . $mimeType;
                Storage::disk('public')->put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $image->setAttribute('src', asset('storage/'.$path));
            }
        }
       return $dom->savehtml($dom->documentElement).PHP_EOL . PHP_EOL;
    }
}