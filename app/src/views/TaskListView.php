<?php
namespace views;
use core\http\View;
use controllers\TaskListController;

class TaskListView extends View
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new TaskListController());
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getDocument()
    {
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
