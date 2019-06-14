<?php

namespace Drupal\file_upload\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileDownloadController extends ControllerBase {


    // The file could be downloaded with the link 'main drupal uri' + /my_file/ + 'file name with extension' + /file-dl
    public function content($param) {

        $uri = 'public://my_files/' . $param;
        $headers = array(
                'Content-Type'     => 'application/pdf',
                'Content-Disposition' => 'attachment;filename="'.$param.'"');
        
        return new BinaryFileResponse($uri, 200, $headers, true);
    }
}

