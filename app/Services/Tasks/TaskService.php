<?php


namespace App\Services\Tasks;


use App\Entities\Task;

class TaskService
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return Task::paginate(3);
    }

    /**
     * @param array $data
     * @return Task|\Illuminate\Database\Eloquent\Model
     */
    public function storeTask(array $data)
    {
        $data['image'] = '';

        $task = Task::create($data);

        return $task;
    }
}