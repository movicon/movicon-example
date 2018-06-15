<?php
namespace models;
use movicon\db\DbActiveRecord;

class TaskModel extends DbActiveRecord
{
    public function __construct($db, $id = null)
    {
        parent::__construct($db, "task", $id);
    }

    public static function getList($db)
    {
        $sql = "
        select
            id,
            title,
            state,
            updated_at
        from task
        order by updated_at desc";

        return $db->queryAll($sql);
    }

    public function update()
    {
        $this->updatedAt = date("Y-m-d H:i:s");
        parent::update();
    }

    public function insert()
    {
        $this->updatedAt = date("Y-m-d H:i:s");
        return parent::insert();
    }
}
