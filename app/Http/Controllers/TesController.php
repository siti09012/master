<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TesController extends Controller
{
    public function index()
	{
		// Make it or pass it as argument
		$oxford = app(Inani\OxfordApiWrapper\OxfordWrapper::class);
		// look for the translation from a language to an other, returns a parser
		$parser =$oxford->lookFor('what')
					->from('EN')
					->to('ID')
					->translate();
		// get array of translations
		$translations = $parser->get();
					
		// get array of [example => [translations]]
		$examples = $parser->getExamples();
		
		return view('tes',$examples);
	}
}
