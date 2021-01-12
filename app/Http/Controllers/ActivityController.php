<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{

    
    /*
     * Go to Activity Create Page.
     */
    public function getCreate(){
        return view('activity.createActivity');
    }


    /*
     * Create New Activity
     *
     * @param new activity data, items data
     */

    public function postCreate(Request $request){

        $this->validate($request, [
            'number_participants' => 'required|integer',
            'item_price.*' => 'required|regex:/^\d+(\.\d{1,27})?$/',
        ]);

        $user_id = Auth::User()->id;

        $item_name = $request->item_name;
        $item_price = $request->item_price;

        $total_cost = 0;
        for($i = 0;$i < count($item_price) ; $i++){
            $total_cost += $item_price[$i];
        }
        $average_cost = $total_cost/count($item_price);


        $activity = new Activity();

        $activity->name = $request->name;
        $activity->address = $request->address;
        $activity->start_date = $request->start_date;
        $activity->end_date = $request->end_date;
        $activity->access_code = $request->access_code;
        $activity->number_participants = $request->number_participants;
        $activity->other_details = $request->other_details;
        $activity->total_cost = $total_cost;
        $activity->average_cost = $average_cost;
        $activity->user_id = $user_id;
        $activity->activity_status = 'inProgress';

        $activity->save();

        for ($i=0 ; $i<count($item_name) ; $i++){
            $item = new Item();

            $item->name = $item_name[$i];
            $item->price = $item_price[$i];
            $item->extra_cost = $average_cost - $item_price[$i];
            $item->activity_id = $activity->id;
            $item->user_id = $user_id;
            $item->checked = 'no';

            $item->save();
        }

        return redirect('/displayActivities')->withCreate('success');

    }


    /*
     * Go go to Activities Display Page.
     */

    public function getDisplay(){
        $user_id = Auth::User()->id;
        $data = Activity::where('user_id',$user_id)->get();
        foreach ($data as $datum){
            $datum['items'] = DB::table('items')->where('activity_id',$datum->id)->get();
        }

        return view('activity.displayActivities', ['activities' => $data]);
    }


    /*
     * Delete Selected Activity.
     *
     * @param selected activity id
     */

    public function postDelete(Request $request){

        $id = $request->id;

        DB::table('items')->where('activity_id', $id)->delete();
        DB::table('activities')->delete($id);

        return back()->withDelete('success');
    }


    /*
     *Go to Selected Activity Update Page.
     *
     * @param selected activity id
     */

    public function getEdit($id){

        $data = Activity::Find($id);
        $data['items'] = DB::table('items')->where('activity_id',$data->id)->get();

        return view('activity.editActivity', ['data'=>$data]);
    }


    /*
     * Update Selected Activity.
     *
     * @param selected activity id, activity data
     */

    public function postUpdate(Request $request){

        $this->validate($request, [
            'number_participants' => 'required|integer',
            'item_price.*' => 'required|regex:/^\d+(\.\d{1,27})?$/',
        ]);

        $id = $request->id;

        $user_id = Auth::User()->id;

        $item_name = $request->item_name;
        $item_price = $request->item_price;

        $total_cost = 0;

        for($i = 0;$i < count($item_price) ; $i++){
            $total_cost += $item_price[$i];
        }

        $average_cost = $total_cost/count($item_price);

        DB::table('activities')->where('id',$id)->update(['name'=>$request->name, 'address'=>$request->address,
            'start_date'=>$request->start_date, 'end_date'=>$request->end_date, 'access_code'=>$request->access_code,
            'number_participants'=>$request->number_participants, 'other_details'=>$request->other_details, 'total_cost'=>$total_cost,
            'average_cost'=>$average_cost, 'user_id'=>$user_id, 'activity_status'=>'inProgress']);

        try{
            DB::table('items')->where('activity_id', $id)->delete();
        } catch (Exception $e){

        }



        for ($i=0 ; $i<count($item_name) ; $i++){
            $item = new Item();

            $item->name = $item_name[$i];
            $item->price = $item_price[$i];
            $item->extra_cost = $average_cost - $item_price[$i];
            $item->activity_id = $id;
            $item->user_id = $user_id;
            $item->checked = 'no';

            $item->save();
        }

        return redirect('/displayActivities')->withUpdate('success');
    }


    /*
     * Finish Selected Activity
     *
     * @param selected activity data
     */

    public function postFinish(Request $request){

        $u_id = $request->u_id;

        $items = $request->checked_item;

        $activity_id = DB::table('items')->where('id',$u_id)->first()->activity_id;

        DB::table('items')->where('activity_id',$activity_id)->update(['checked'=>'no']);

        try{
            $total_cost = 0;

            $average_cost = 0;

            for($i = 0;$i < count($items) ; $i++){
                $id = $items[$i];

                $total_cost += DB::table('items')->where('id',$id)->first()->price;
            }
            $average_cost = $total_cost/count($items);

            for ($j=0;$j<count($items);$j++){
                $id = $items[$j];

                $extra = $average_cost - DB::table('items')->where('id',$id)->first()->price;
                DB::table('items')->where('id',$id)->update(['checked'=>'yes', 'extra_cost'=>$extra]);
            }

            if (count($items) == count(DB::table('items')->where('activity_id',$activity_id)->get())){
                $activity_status = 'Finished';
            }else{
                $activity_status = 'inProgress';
            }

        }catch (Exception $e){
            $activity_status = 'inProgress';
        }

        DB::table('activities')->where('id',$activity_id)->update(['total_cost'=>$total_cost, 'average_cost'=>$average_cost, 'activity_status'=>$activity_status]);

        $data = Activity::Find($activity_id);

        $data['items'] = DB::table('items')->where('activity_id',$data->id)->where('checked', 'yes')->get();

        return view('activity.summary', ['data'=>$data]);

    }
}
