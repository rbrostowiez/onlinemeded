<?php

namespace App\Http\Controllers;

use App\Http\Resources\ToDoListResource;
use App\ToDoItem;
use App\ToDoList;
use Illuminate\Http\JsonResponse;
use \Illuminate\Http\Request;

class ToDoListController extends Controller
{

    protected $toDoList;

    public function __construct()
    {
        //$this->toDoList = $toDoList;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return ToDoListResource::collection(ToDoList::with('toDoItems')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ToDoListResource
     */
    public function store(Request $request)
    {
        $toDoList = new ToDoList;

        $toDoList->name = $request->input('name');

        $toDoList->save();

        return new ToDoListResource($toDoList);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ToDoListResource
     */
    public function show($id)
    {
        return new ToDoListResource(ToDoList::with('toDoItems')->where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ToDoListResource
     */
    public function update(Request $request, $id)
    {
        $toDoList = ToDoList::where('id', $id)->first();

        $toDoList->name = $request->input('name');

        $toDoList->save();

        return new ToDoListResource($toDoList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var ToDoList $toDoList */
        $toDoList = ToDoList::where('id', $id)->first();
        $toDoList->delete();

        return new JsonResponse(['success' => true]);
    }

    /**
     * @param Request $request
     * @param $listId number ID of the list for the provided item
     * @param $listItemId number ID of the listItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateToDoListItem(Request $request, $listId, $listItemId)
    {
        /** @var ToDoItem $toDoItem */
        $toDoItem = ToDoItem::where('id', $listItemId)->first();

        $toDoItem->to_do_list_id = $listId;
        $toDoItem->description = $request->input('description', '');
        $toDoItem->completed = $request->input('completed', false);

        $toDoItem->save();

        return new JsonResponse(['success' => true]);
    }

    /**
     * @param Request $request
     * @param $listId number ID of the list for the provided item
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeToDoListItem(Request $request, $listId)
    {
        $toDoItem = new ToDoItem;
        $toDoItem->to_do_list_id = $listId;
        $toDoItem->description = $request->input('description', '');
        $toDoItem->completed = $request->input('completed', false);

        $toDoItem->save();

        return new JsonResponse(['success' => true]);
    }

    /**
     * @param $listId number ID of the list for provided item
     * @param $listItemId number ID of the listItem
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroyToDoListItem($listId, $listItemId)
    {
        /** @var ToDoList $toDoItem */
        $toDoItem = ToDoItem::where('id', $listItemId)->first();

        $toDoItem->delete();

        return new JsonResponse(['success' => true]);
    }
}
