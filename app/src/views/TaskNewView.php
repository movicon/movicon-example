<?php
namespace views;
use core\http\View;
use controllers\TaskNewController;

class TaskNewView extends View
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new TaskNewController());
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
