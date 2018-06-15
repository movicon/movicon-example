<?php
namespace views;
use core\http\View;
use controllers\TasksController;

class TasksView extends View
{
    public function __construct()
    {
        parent::__construct(new TasksController());
    }

    public function getDocument() {
        return json_encode(
            array_map(
                function ($task) {
                    return [
                        "id" => $task["id"],
                        "title" => $task["title"],
                        "state" => $task["state"],
                        "updated" => $task["updated_at"]
                    ];
                },
                $this->controller->getList()
            )
        );
    }
}
