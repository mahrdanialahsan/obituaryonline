<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Log;

trait CommonTrait {
// trait methods and properties here

    public function uploadImage($request,$file,$newWidth,$newHeight,$path_file_name)
    {
        try {
            // Get the uploaded image file
            $image = $request->file($file);

            // Create an image resource from the file
            $imageRes = imagecreatefromjpeg($image->getPathname());

            // Get the original width and height of the image
            $originalWidth = imagesx($imageRes);
            $originalHeight = imagesy($imageRes);

            // If new width and height are provided, calculate the aspect ratio
            if ($newWidth && $newHeight) {
                $aspectRatio = $originalWidth / $originalHeight;

                // Calculate the maximum width and height that can fit inside the new dimensions
                $maxWidth = $newHeight * $aspectRatio;
                $maxHeight = $newWidth / $aspectRatio;

                // If the maximum width fits inside the new width, use it and the new height
                if ($maxWidth <= $newWidth) {
                    $width = $maxWidth;
                    $height = $newHeight;
                }
                // Otherwise, use the new width and the maximum height
                else {
                    $width = $newWidth;
                    $height = $maxHeight;
                }
            }
            // If only a new width is provided, calculate the new height based on aspect ratio
            elseif ($newWidth) {
                $aspectRatio = $originalWidth / $originalHeight;
                $height = round($newWidth / $aspectRatio);
                $width = $newWidth;
            }
            // If only a new height is provided, calculate the new width based on aspect ratio
            elseif ($newHeight) {
                $aspectRatio = $originalWidth / $originalHeight;
                $width = round($newHeight * $aspectRatio);
                $height = $newHeight;
            }
            // If neither a new width nor a new height is provided, use the original dimensions
            else {
                $width = $originalWidth;
                $height = $originalHeight;
            }

            // Create a new empty image resource with the new dimensions
            $newImageRes = imagecreatetruecolor($width, $height);

            // Resize the image to the new dimensions
            imagecopyresampled($newImageRes, $imageRes, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

            // Save the resized image to disk
            imagejpeg($newImageRes, storage_path('app/public/' . $path_file_name));
            Log::error('uploaded');
            return true;
        }
        catch (\Exception $ex){
            Log::error($ex->getMessage());
            return false;
        }


    }
}