<?php
require_once $_SERVER ['DOCUMENT_ROOT'].'/lib/Common/autoloader.php';

class formController
{
    private $userDao;
    private $companyDao;
    
    public function __construct()
    {
        $this->userDao = new UserDao();
        $this->companyDao = new CompanyDao();
    }
    
    public function getUserOption()
    {
        $result = $this->userDao->get();
        $option="";
        foreach($result as $row){
            $option.="<option value=".$row['id'].">".$row['user_name']."</option>";
        }
        return $option;
    }
    
    public function getCompanyOption()
    {
        $result = $this->companyDao->get();
        $option="";
        foreach($result as $row){
            $option.="<option value=".$row['id'].">".$row['company_name']."</option>";
        }
        return $option;
    }
}