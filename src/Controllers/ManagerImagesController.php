<?php namespace NexCoding\ImageManagerCi4\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class ManagerImagesController extends BaseController
{

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        $this->mediaModel = model('MediaModel');
    }

    public function upload()
    {
        if ($this->request->getMethod() === 'post' && $this->request->getFile('formFile')) {
            $file = $this->request->getFile('formFile');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();

                // Get the current date in YYYYMMDD format
                $currentDate = date('Ymd');

                // Create the directory path based on the current date
                $directoryPath = 'uploads/' . $currentDate;

                // Create the directory if it doesn't exist
                if (!is_dir($directoryPath)) {
                    mkdir($directoryPath, 0777, true);
                }

                // Move the uploaded image to the directory
                $file->move($directoryPath, $newName);

                $this->mediaModel->insert([
                    'm_file_name' => $newName,
                    'm_file_type' => $file->getClientMimeType(),
                    'm_file_size' => $file->getSize(),
                    'm_file_ext' => $file->getClientExtension(),
                    'm_file_path' => $directoryPath . '/' . $newName,
                    'm_orig_name' => $file->getName(),
                ]);

                return redirect()->back()->with('success', 'file uploaded successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
        }
    }

    public function index()
    {
        return view('\NexCoding\ImageManagerCi4\Views\index');
    }

    public function selectOne()
    {
        return view('\NexCoding\ImageManagerCi4\Views\select_one');
    }

    public function selectMulti()
    {
        return view('\NexCoding\ImageManagerCi4\Views\select_multi');
    }

    //Ajax
    public function ajax_media($page = 1)
    {
        $perPage = 10;
        $startIndex = ($page - 1) * $perPage;

        $images = $this->mediaModel->getImages($startIndex, $perPage);
        //$mediaModel = new \App\Models\MediaModel();
        return $this->response->setJSON($images);
    }
}
