<?php
namespace views;
use core\http\View;
use controllers\TaskEditController;

class TaskEditView extends View
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new TaskEditController());
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getDocument()
    {
        $task = $this->controller->task;

        return json_encode(
            [
                "id" => $task->id,
                "title" => $task->title,
                "state" => $task->state,
                "updated" => $task->updatedAt
            ]
        );
    }
}
