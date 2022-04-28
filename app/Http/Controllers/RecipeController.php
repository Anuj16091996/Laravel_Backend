<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\HttpKernel\Exception\HttpException;
class RecipeController extends Controller
{

    public function sendAllRecipes(Request $request)
    {

        $value = DB::select("select * from users");
        $Json = ([
            "results" => $value
        ]);
        return $Json;
    }

    public function insert(Request $request)
    {
        try {
            $output = new ConsoleOutput();
            $output->writeln($request->all());
          return $request->all();

        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage(),
                "status"=>500], 404);
        }

    }


    public function index(Request $request)
    {
        try {

            //TO debug on terminal;
            $output = new ConsoleOutput();
            $output->writeln($request->route('id'));
            return  $request->route('id');
        }catch (\Exception $e){
            throw new HttpException(500, $e->getMessage());
        }
    }
}
