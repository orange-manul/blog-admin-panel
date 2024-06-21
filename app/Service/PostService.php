<?php

namespace App\Service;

use App\Http\Requests\Admin\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function updatePost(UpdateRequest $request, $post, $validatedData): void
    {
        // Handling the upload of a new image if present
        if ($request->hasFile('image')) {
            // Удаление старых изображений
            $this->deleteOldImages($post);

            // Upload the new image to the storage
            $path = $request->file('image')->store('images', 'public');

            // Create a new record for the image in the database
            $post->images()->create([
                'path' => $path,
            ]);
        }

        // Update the remaining post data
        $post->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);
    }

    private function deleteOldImages($post): void
    {
        if ($post->images->isNotEmpty()){
            foreach ($post->images as $image){
                Storage::disk('public')->delete($image->path);

                $image->delete();
            }
        }
    }

}
