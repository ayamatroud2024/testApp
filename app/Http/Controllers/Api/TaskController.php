<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Events\TaskStatusUpdated;

class TaskController extends ApiController
{
    public function __construct()
    {
        $this->resource = TaskResource::class;
        $this->model = app(Task::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( TaskRequest $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){

             $task=Task::find($id);

             if($task){

                if($task->user_id != auth()->user()->id){

                    return $this->returnError('Sorry! You cant edit only your tasks');
                }



                 // Check if the status is being updated
                 $originalStatus = $task->status;

                $task = $this->repositry->edit( $id,$request->all() );


                if ($originalStatus !== $task->status) {
                    // Fire the event if the status has changed
                    event(new TaskStatusUpdated($task));
                       }



                return $this->returnData('data', new $this->resource( $task ), __('Updated succesfully'));

             }


         return $this->returnError(__('Sorry! Failed to get !'));

    }



    public function deleteByID( $model_id )
    {
        $model = $this->model->find($model_id);



        if (!$model) {
            return $this->returnError(__('Sorry! Failed to get !'));
        }


        if($model->user_id != auth()->user()->id){

            return $this->returnError('Sorry! You cant delete only your tasks');
        }


            $model->delete();


        return $this->returnSuccessMessage('Delete succesfully!!');


    }


    public function filterTasks(Request $request){

        $data = Task::where('title', 'like', '%' . $request->search . '%')
                     ->orWhere('status', $request->search)
                     ->paginate(10);

        if ($data) {
            return $this->returnData('data', $this->resource::collection( $data ), __('Get  succesfully'));
        }

        return $this->returnError(__('Sorry! Failed to get !'));


    }

}
