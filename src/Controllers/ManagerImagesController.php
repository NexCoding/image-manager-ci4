<?php namespace NexCoding\ImageManagerCi4\Controllers;

use App\Controllers\BaseController;
class ImageController extends BaseController
{
    public function upload()
    {
        echo "upload";
        // Redirect to a page or return a response
    }

    public function index()
    {
        echo "index";
        
        // Load a view and pass $imageList to display the images
        // For example:
        // return view('image/list', ['imageList' => $imageList]);
    }
}