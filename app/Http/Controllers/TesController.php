<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use OxfordAPI;

class TesController extends Controller
{
    public function index()
	{
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
		
		// Make it or pass it as argument
		//$oxford = app(Inani\oxfordapiwrapper\OxfordWrapperServiceProvider::class);
		$oxford = OxfordAPI::class;
		// look for the translation from a language to an other, returns a parser
		$hasil = $oxford ->lookFor()
				->from('EN')
				->to('ID')
				->translate()
				->get()
				->getExamples();
		// get array of translations
		$translations = $hasil->get();
					
		// get array of [example => [translations]]
		$examples = $hasil->getExamples();
		
		return view('tes',$examples);
	}
}
