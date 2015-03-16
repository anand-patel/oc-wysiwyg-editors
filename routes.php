<?php

use Backend\Facades\BackendAuth;

/**
 * Filter to Authenticate Backend User
 */
Route::filter('authenticate', function()
{
    if (!BackendAuth::check())
    {
        return "You don`t have permission to access this page!!!";
    }
});

/**
 * Routes for CKEditor, TinyMCE and Froala
 */
Route::group(array('before' => 'authenticate'), function()
{
    /**
     * elFinder routes
     */
    Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
    Route::get('elfinder/ckeditor4', 'Barryvdh\Elfinder\ElfinderController@showCKeditor4');
    Route::get('elfinder/tinymce4', 'Barryvdh\Elfinder\ElfinderController@showTinyMCE4');

    /**
     * Froala Image upload
     */
    Route::post('image_upload', function()
    {
        // Allowed extentions.
        $allowedExts = array('gif', 'jpeg', 'jpg', 'png');

        // Get filename.
        $temp = explode('.', $_FILES['file']['name']);

        // Get extension.
        $extension = end($temp);

        // An image check is being done in the editor but it is best to
        // check that again on the server side.
        // Do not use $_FILES['file']['type'] as it can be easily forged.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);

        if ((($mime == 'image/gif')
                || ($mime == 'image/jpeg')
                || ($mime == 'image/pjpeg')
                || ($mime == 'image/x-png')
                || ($mime == 'image/png'))
            && in_array($extension, $allowedExts)
        ) {
            // Generate new random name.
            $name = sha1(microtime()).'.'.$extension;

            // Save file in the uploads folder.
            move_uploaded_file($_FILES['file']['tmp_name'], getcwd().'/storage/app/uploads/'.$name);

            // Generate response.
            $response = new StdClass;
            $response->link = asset('/storage/app/uploads/'.$name);
            echo stripslashes(json_encode($response));
        }
    });

    /**
     * Froala Image Delete
     */
    Route::post('delete_image', function()
    {
        // Get src.
        $src = basename($_POST['src']);

        // Check if file exists.
        if (file_exists(getcwd().'/storage/app/uploads/'.$src))
        {
            // Delete file.
            unlink(getcwd().'/storage/app/uploads/'.$src);
        }
    });
});
