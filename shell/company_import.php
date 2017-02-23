<?php

/**
 * Created by nick
 * Project magento.dev
 * Date: 2/22/17
 * Time: 3:27 PM
 */

require_once 'abstract.php';

class Mage_Shell_CompanyImport extends Mage_Shell_Abstract{

    const COMPANY_ID = 0;
    const COMPANY_NAME = 1;
    const COMPANY_URL = 2;
    const COMPANY_EMAIL = 3;
    const COMPANY_TEL = 4;          //file
    const COMPANY_LOGO_IMG = 5;
    const COMPANY_ADDRESS = 6;
    const COMPANY_DESCRIPTION = 7;
    const COMPANY_CREATED_AT = 8;
    const COMPANY_TYPE = 9;         //multi select
    const COMPANY_ACTIVITY = 10;    //multi select
    const COMPANY_CITY = 11;
    const COMPANY_COUNTRY = 12;
    const COMPANY_LICENSES = 13;    //files
    const COMPANY_ADDITIONAL_IMG = 14;//files
    const COMPANY_APPROVED = 15;
    const COMPANY_BALANCE = 16;
    const COMPANY_PARENT_COMPANY_ID = 17;

    protected $_importImagePath;
    protected $_basePath;

    public function run(){
        $this->_init();
        $this->uploadFile($this->_importImagePath . '10.png');
        if ($this->getArg('file')) {
            $this->_init();
            $path = $this->getArg('file');
            echo 'reading data from ' . $path . PHP_EOL;
            if (false !== ($file = fopen($path, 'r'))) {
                while (false !== ($data = fgetcsv($file, 10000, ',', '"'))) {
                    $this->addCompany($data);
                    printf("Adding %s \n" . $data[self::COMPANY_NAME]);
                }
                fclose($file);
            }
        } else {
            echo $this->usageHelp();
        }
    }

    protected function _init(){
        $this->_importImagePath = $path = Mage::getBaseDir('media') . DS . 'import/';
        $this->_basePath = $path = Mage::getBaseDir('media') . DS . 'company';
    }

    public function addCompany($companyData){
        $model = Mage::getModel('company/company');
        $data = array(
            'entity_id'     => $companyData[self::COMPANY_ID],
            'name'          => stripslashes($companyData[self::COMPANY_NAME]),
            'description'   => $companyData[self::COMPANY_DESCRIPTION],
        );

        $model->setData($data);
        $model->save();
    }

    public function getAttributeId($attribute, $value){

    }

    public function uploadFile($file){
        print_r($file);
        try {
            $uploader = new Varien_File_Uploader($file);
            $path = $this->_basePath;
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            $uploader->save($path, $file);
            $newFilename = $uploader->getUploadedFileName();
            echo $newFilename;
        }catch(Exception $e){
            echo "Error when upload file";
        }
    }

    /**
     * Retrieve Usage Help Message
     *
     */
    public function usageHelp()
    {
        return <<<USAGE
Usage:  php -f company_import.php -- --file <csv_file>
  help                        This help
USAGE;
    }
}

$shell = new Mage_Shell_CompanyImport();
$shell->run();