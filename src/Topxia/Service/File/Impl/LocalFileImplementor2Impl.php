<?php

namespace Topxia\Service\File\Impl;

use Topxia\Service\Common\BaseService;
use Topxia\Service\File\FileImplementor2;

class LocalFileImplementor2Impl extends BaseService implements FileImplementor2
{
    public function getFile($file)
    {

    }

    public function updateFile($globalId, $fields)
    {

    }

    public function findFiles($file,$conditions)
    {
    }

    public function prepareUpload($params)
    {
        return null;
    }

    public function finishedUpload($file, $params)
    {
        return array('success' => true, 'convertStatus' => 'success');
    }

    public function resumeUpload($hash, $params)
    {
    }

    public function getDownloadFile($id)
    {
    }

    public function deleteFile($file)
    {
      $filename = $this->getFileFullPath($file);
      @unlink($filename);
      return true;
    }

    public function search($conditions)
    {

    }

    public function synData($conditions)
    {

    }

    public function initUpload($params)
    {
        $uploadParams = array();

        $uploadParams['uploadMode']          = 'local';
        $uploadParams['url']                 = "/uploadfile/upload?targetId={$params['targetId']}&targetType={$params['targetType']}";
        $uploadParams['postParams']          = array();
        $uploadParams['postParams']['token'] = $this->getUserService()->makeToken('fileupload', $params['userId'], strtotime('+ 2 hours'));

        return $uploadParams;
    }

    protected function getFileFullPath($file)
    {
        if (empty($file['isPublic'])) {
            $baseDirectory = $this->getKernel()->getParameter('topxia.disk.local_directory');
        } else {
            $baseDirectory = $this->getKernel()->getParameter('topxia.upload.public_directory');
        }

        return $baseDirectory.DIRECTORY_SEPARATOR.$file['hashId'];
    }

    protected function getUserService()
    {
        return $this->createService('User.UserService');
    }
}