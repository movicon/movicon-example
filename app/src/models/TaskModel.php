<?php
namespace models;
use movicon\db\DbActiveRecord;
use movicon\db\exception\DbException;

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
        $this->_beforeSave();
        parent::update();
    }

    public function insert()
    {
        $this->_beforeSave();
        return parent::insert();
    }

    public function _beforeSave()
    {
        if (!in_array($this->state, ["open", "closed"])) {
            throw new DbException("Invalid state");
        }

        $this->updatedAt = date("Y-m-d H:i:s");
    }
}
