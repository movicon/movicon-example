<?php
namespace views;
use core\http\View;
use controllers\TaskDeleteController;

class TaskDeleteView extends View
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new TaskDeleteController());
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->controller->message;
    }
}
