<?php
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Number;
/**
 * Safetyreport helper
 */
class SafetyreportHelper extends Helper
{

	public function getIcon($client_id=null, $contractor_id=null) {
		$this->OverallIcons = \Cake\ORM\TableRegistry::getTableLocator()->get('OverallIcons');

		$matrix = $this->OverallIcons
		->find()
		->where(['OverallIcons.client_id'=>$client_id, 'OverallIcons.contractor_id'=>$contractor_id])
		->orderBy(['OverallIcons.created'=>'DESC'])
		->limit(1)
		->toArray();

		return $matrix;
	}

	public function getIconCat($client_id=null, $contractor_id=null) {
		$this->Icons = \Cake\ORM\TableRegistry::getTableLocator()->get('Icons');

		$matrix = $this->Icons
		->find()
		->where(['Icons.client_id'=>$client_id, 'Icons.contractor_id'=>$contractor_id])
		->orderBy(['Icons.created'=>'DESC'])
		->limit(1)
		->toArray();

		return $matrix;
	}

	/*public function getBenchmarkCategories($client_id=null, $bencType=null) {
		$this->Benchmarks = TableRegistry::get('Benchmarks');

		$categories = $this->Benchmarks->find('list', ['keyField'=>'id', 'valueField'=>'category'])
		->contain(['BenchmarkTypes'])
		->order(['Benchmarks.id'])
		->where(['BenchmarkTypes.name'=>$bencType, 'Benchmarks.client_id'=>$client_id])
		->toArray();

		return $categories;
	}*/
}
