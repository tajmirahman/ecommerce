<?php

use Intervention\Image\Facades\Image;

class Helper
{
    public static function customUpload($mainFile, $uploadPath, ?int $reqWidth = null, ?int $reqHeight = null): array
    {
        // Create an empty output array
        $output = [];

        // Get the hashed file name
        $fileName = $mainFile->hashName();
        $uploadPath = str_replace('/', DIRECTORY_SEPARATOR, $uploadPath);

        // Create the requestImg directory if it does not exist
        if (!is_dir("{$uploadPath}/requestImg")) {
            if (!mkdir("{$uploadPath}/requestImg", 0777, true)) {
                throw new Exception("Failed to create the directory: {$uploadPath}/requestImg");
            }
        }

        // Check if the uploaded file is an image
        if (strpos($mainFile->getMimeType(), 'image') === 0) {
            // Image file upload
            $main_image = Image::make($mainFile);
            $main_image->save("{$uploadPath}/{$fileName}");

            if (!empty($reqWidth) && !empty($reqHeight)) {

                $img = Image::make($mainFile)->resize($reqWidth, $reqHeight);
                $img->save("{$uploadPath}/requestImg/{$fileName}");

            };

        } else {
            // Non-image file upload
            $mainFile->storeAs($uploadPath, $fileName);
        }

        // Populate the output array with file information
        $output = [
            'status' => 1,
            'file_name' => $fileName,
            'file_extension' => $mainFile->getClientOriginalExtension(),
            'file_size' => $mainFile->getSize(),
        ];

        // Return the output array
        return array_map('htmlspecialchars', $output);
    }
}
