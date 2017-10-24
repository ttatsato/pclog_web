<?php
namespace lib\Controller;

class_exists('lib\Controller\Form\FormController') or require_once  $_SERVER['DOCUMENT_ROOT'].'/lib/Controller/Form/FormController.php';
class_exists('lib\Service\\CreateGraph') or require_once  $_SERVER['DOCUMENT_ROOT'].'/lib/Service/CreateGraph.php';

use lib\Controller\Form\FormController as FormController;
use lib\Service\CreateGraph as CreateGraph;

/**
 * 日別グラフコントローラ
 **/
class DailyGraphController
{
	/** エラーメッセージ*/
	private $errorMessage = [];
	
		/** ユーザー選択肢を表示する*/
		public function displayUserOption()
		{
			$formController = new FormController();
			return $formController->getUserOption();
		}
	
		/** 企業名選択肢を表示する*/
		public function displayCompanyOption()
		{
			$formController = new FormController();
			return $formController->getCompanyOption();
		}
	
		/**
		 * グラフを作成
		 * @access public 
		 **/
		public function createGraph($val = null)
		{
				try{
					$result = false;
					if($val){
						/** グラフ作成クラスのインスタンス*/
						$createGraph = new CreateGraph();
						/** 引数を渡してグラフの作成*/
						$result = $createGraph->create($val);
					}
				}catch(exception $e){
					
				}finally{
					return $result;
				}
			
		}
    
    /* 30分グラフ */
    public function thirtiethMin($val)
    {
        $this->setVal($val['date'], $val['company'], $val['user'],"30m");
        $result = $this->create();
        if(!$result){
            return $this->dataNotAvailable();
        }else{
            return $result;
        }
    }
    
    /* 1時間グラフ */
    public function hourhMin($val)
    {
        $this->setVal($val['date'], $val['company'], $val['user'],"1h");
        $result = $this->create();
        if(!$result){
            return $this->dataNotAvailable();
        }else{
            return $result;
        }
    }
}