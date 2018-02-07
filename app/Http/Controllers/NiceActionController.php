<?php
/**
 * Created by PhpStorm.
 * User: JCMANO
 * Date: 04/02/2018
 * Time: 2:23 AM
 */

namespace App\Http\Controllers;

use App\NiceActionLog;
use \Illuminate\Http\Request;
use App\NiceAction;

class NiceActionController extends Controller
{
    public function getHome(){
        $actions = NiceAction::all();
        $logged_actions = NiceActionLog::all();
        return view('home', ['actions' => $actions,
            'logged_actions' => $logged_actions]);
    }

    public function getNiceAction($action, $name = null){
        if ($name === null){
            $name = 'you';
        }
        $nice_action = NiceAction::where('name', $action)->first();
        $nice_action_log = new NiceActionLog();
        $nice_action->logged_actions()->save($nice_action_log);

        return view('actions.nice', ['action' => $action, 'name' => $name]);
    }

    public function postInsertNiceAction(Request $request){
        $this->validate($request, ['name' => 'required|alpha|unique:nice_actions',
            'niceness' => 'required|numeric']);


        $action = new NiceAction();
        $action->name = $request['name'];
        $action->niceness = $request['niceness'];
        $action->save();

        $actions = NiceAction::all();

        return redirect()->route('home', ['actions' => $actions]);
    }

    private function transformName($name){
        $prefix = 'KING ';
        return $prefix . strtoupper($name);
    }
}