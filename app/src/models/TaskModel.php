<?php
namespace models;
use movicon\db\DbActiveRecord;
use movicon\db\exception\DbException;

class TaskModel extends DbActiveRecord
{
    /**
     * Constructor.
     *
     * @param DbConnection $db Database connection
     * @param string       $id Record ID
     */
    public function __construct($db, $id = null)
    {
        parent::__construct($db, "task", $id);
    }

    /**
     * Gets the list of tasks.
     *
     * @param DbConnection $db Database connection
     *
     * @return TaskModel[]
     */
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

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function update()
    {
        $this->_beforeSave();
        parent::update();
    }

    /**
     * {@inheritdoc}
     *
     * @return string Record ID
     */
    public function insert()
    {
        $this->_beforeSave();
        return parent::insert();
    }

    /**
     * This method is called before inserting or editing a record.
     *
     * @return void
     */
    private function _beforeSave()
    {
        if (!in_array($this->state, ["open", "closed"])) {
            throw new DbException("Invalid state");
        }

        $this->updatedAt = date("Y-m-d H:i:s");
    }
}
