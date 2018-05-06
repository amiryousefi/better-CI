<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AY_Model extends CI_Model
{
    private $entity;
    public $DB;
    public $fields;
    public $select;

    // array like this : array("column"=>COLUMN_NAME,"sort"=>"desc"); sort key can be asc or desc, desc is default
    public $order;

    public $search_in_fields;
    public $search_criteria;
    public $get_criteria;
    public $count_criteria;

    public $get_related;

    public $like_criteria;
    public $where_in_criteria;

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->DB)) {
            $this->entity = str_replace("entity", "", strtolower(static::class));
            $this->DB = $this->entity;
        }

        $this->fields = isset($this->fields) ? $this->fields : array();

        $this->search_in_fields = isset($this->search_in_fields) ? $this->search_in_fields : array();

        $this->get_criteria = isset($this->get_criteria) ? $this->get_criteria : array();
        $this->search_criteria = isset($this->search_criteria) ? $this->search_criteria : array();
        $this->count_criteria = isset($this->count_criteria) ? $this->count_criteria : array();

        $this->like_criteria = isset($this->like_criteria) ? $this->like_criteria : array();

        $this->get_related = isset($this->get_related) ? $this->get_related : FALSE;
    }

    public function add($data)
    {
        $this->db->trans_start();
        $this->db->insert($this->DB, $data);
        $inserted_id = $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return $inserted_id;
        }
    }

    public function edit($data)
    {
        $key = "id";
        $this->db->trans_start();
        $this->db->where($key, $data[$key]);
        unset($data[$key]);
        $this->db->update($this->DB, $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;

        } else {
            return TRUE;
        }
    }

    public function delete($id, $column = "id")
    {
        $this->db->trans_start();

        $this->db->where($column, $id);
        $this->db->delete($this->DB);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;

        }
    }

    public function get($id = null, $limit = null, $offset = null, $select = FALSE)
    {
        $this->db->trans_start();

        if ($select !== FALSE) {
            $this->db->select($select);
        } else {
            if (isset($this->select)) {
                $this->db->select($this->select);
            }
        }

        if (is_numeric($id)) {
            $this->db->where('id', $id);
        }

        if (count($this->get_criteria) > 0) {
            $this->db->group_start();
            foreach ($this->get_criteria as $key => $value) {
                $this->db->where($key, $value);
            }
            $this->db->group_end();
        }

        if (count($this->like_criteria) > 0) {
            $this->db->group_start();

            $check_first = 1;
            foreach ($this->like_criteria as $key => $value) {
                if ($check_first === 1) {
                    $this->db->like($key, $value);
                } else {
                    $this->db->or_like($key, $value);
                }
                $check_first += 1;
            }

            $this->db->group_end();
        }

        if (isset($this->where_in_criteria)) {
            $column = element("column", $this->where_in_criteria, FALSE);
            $ids = element("ids", $this->where_in_criteria, FALSE);
            if ($column !== FALSE && $ids !== FALSE) {
                $this->db->where_in($column, $ids);
            } elseif ($column === FALSE && $ids === FALSE && is_array($this->where_in_criteria)) {
                foreach ($this->where_in_criteria as $column => $ids) {
                    $this->db->where_in($column, $ids);
                }
            }
        }

        if (isset($this->order)) {
            if ($this->order != FALSE) {
                if (is_array($this->order)) {
                    $column = element('column', $this->order, FALSE);
                    $sort = element('sort', $this->order, "desc");
                    if ($column !== FALSE) {
                        $this->db->order_by($column, $sort);
                    }
                } elseif (is_string($this->order)) {
                    $column = $this->order;
                    $sort = "desc";
                    if ($column !== FALSE) {
                        $this->db->order_by($column, $sort);
                    }
                }
            }
        } else {
            $this->db->order_by("id", "desc");
        }


        if ($limit !== null && $offset !== null) {
            $query = $this->db->get($this->DB, $limit, $offset);
        } else {
            $query = $this->db->get($this->DB);

        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($this->get_related == FALSE) {
                return ($query->result_array());
            } else {
                return $this->get_related($query->result_array(), $this->fields);
            }
        }
    }

    public function get_related($data, $fields)
    {
        foreach ($fields as $field => $attr) {
            if (element("retriever", $attr, FALSE) !== FALSE) {
                foreach ($data as $key => $row) {
                    $retriever = element("retriever", $attr, FALSE);
                    $retrieved_data = $this->$retriever($row['id']);
                    $data[$key][$field] = $retrieved_data;
                }
                continue;
            }

            // three type of relation: 1:1, 1:n, n:n
            if (element("related", $attr, FALSE) !== FALSE) {
                $relation = element("type", $attr['related'], "1:1");
                foreach ($data as $key => $row) {

                    switch ($relation) {
                        case "1:1": {
                            $table = element("table", $attr['related'], str_replace("_id", "", $field));
                            $select = element("select", $attr['related'], "name");
                            $key_name = element("key", $attr['related'], str_replace("_id", "", $field));

                            if (isset($row[$field]) && $row[$field] != NULL) {
                                $related_data = $this->get_related_oo($row[$field], $table, $select);
                                if (count($related_data) == 1 && is_array($related_data)) {
                                    $data[$key][$key_name] = $related_data[0][$select];
                                } else {
                                    $data[$key][$key_name] = NULL;
                                }
                            } else {
                                $data[$key][$key_name] = NULL;
                            }

                            break;
                        }

                        case "1:n": {
                            $table = element("table", $attr['related'], $field);
                            $select = element("select", $attr['related'], "name");
                            $column = element("column", $attr['related'], $this->DB . "_id");
                            $key_name = element("key", $attr['related'], $field);
                            $criteria = element("criteria", $attr['related'], array());
                            $related_datas = $this->get_related_on($row["id"], $table, $column, $criteria, "id," . $select);
                            if (is_array($related_datas)) {
                                foreach ($related_datas as $related_data) {
                                    $data[$key][$key_name][$related_data["id"]] = $related_data[$select];
                                }
                            } else {
                                $data[$key][$key_name] = NULL;
                            }

                            break;
                        }

                        case "n:n": {
                            $table = element("table", $attr['related'], $field);
                            $select = element("select", $attr['related'], "name");
                            $column = element("column", $attr['related'], $this->DB . "_id");
                            $key_name = element("key", $attr['related'], $field);
                            $criteria = element("criteria", $attr['related'], array());
                            $middle_table = element("middle_table", $attr['related'], $this->DB . "_" . $table);
                            $middle_column = element("middle_column", $attr['related'], $field . "_id");
                            $middle_criteria = element("middle_criteria", $attr['related'], array());

                            $related_datas = $this->get_related_nn($row["id"], $table, $column, $criteria, "id," . $select, $middle_table, $middle_column, $middle_criteria);
                            if (is_array($related_datas)) {
                                if ($table === FALSE) {
                                    $data[$key][$key_name] = $related_datas;
                                } else {
                                    foreach ($related_datas as $related_data) {
                                        $data[$key][$key_name][$related_data["id"]] = $related_data[$select];
                                    }
                                }

                            } else {
                                $data[$key][$key_name] = NULL;
                            }
                            break;
                        }

                        default: {
                            break;
                        }
                    }
                }
            }

        }
        return $data;
    }

    public function search($term, $limit = null, $offset = null, $search_in_fields = array(), $select = FALSE)
    {
        $this->db->trans_start();
        if ($select !== FALSE) {
            $this->db->select($select);
        } else if ($limit === FALSE) {
            $this->db->select("id");
        } else {
            if (isset($this->select)) {
                $this->db->select($this->select);
            }
        }

        $this->db->group_start();
        $this->db->like('id', $term);
        if (count($search_in_fields) == 0) {
            foreach ($this->search_in_fields as $search_field) {
                $this->db->or_like($search_field, $term);
            }
        } else {
            foreach ($search_in_fields as $search_field) {
                $this->db->or_like($search_field, $term);
            }
        }
        $this->db->group_end();

        foreach ($this->search_criteria as $key => $value) {
            $this->db->where($key, $value);
        }

        if ($limit !== null && $offset !== null) {
            $query = $this->db->get($this->DB, $limit, $offset);
        } else {
            $query = $this->db->get($this->DB);
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($limit === FALSE) {
                return $query->num_rows();
            } else {
                if ($this->get_related == FALSE) {
                    return ($query->result_array());
                } else {
                    return $this->get_related($query->result_array(), $this->fields);
                }
            }
        }
    }

    public function get_by_column($key, $value, $limit = null, $offset = null, $select = FALSE)
    {
        $this->db->trans_start();

        if ($select !== FALSE) {
            $this->db->select($select);
        } else {
            if (isset($this->select)) {
                $this->db->select($this->select);
            }
        }

        $this->db->where($key, $value);

        if (count($this->get_criteria) > 0) {
            $this->db->group_start();

            foreach ($this->get_criteria as $key => $value) {
                $this->db->where($key, $value);
            }

            $this->db->group_end();
        }

        if (count($this->like_criteria) > 0) {
            $this->db->group_start();

            $check_first = 1;
            foreach ($this->like_criteria as $key => $value) {
                if ($check_first === 1) {
                    $this->db->like($key, $value);
                } else {
                    $this->db->or_like($key, $value);
                }
                $check_first += 1;
            }

            $this->db->group_end();
        }

        if (isset($this->order)) {
            if (is_array($this->order)) {
                $column = element('column', $this->order, FALSE);
                $sort = element('sort', $this->order, "desc");
                if ($column !== FALSE) {
                    $this->db->order_by($column, $sort);
                }
            } elseif (is_string($this->order)) {
                $column = $this->order;
                $sort = "desc";
                if ($column !== FALSE) {
                    $this->db->order_by($column, $sort);
                }
            }
        } else {
            $this->db->order_by("id", "desc");
        }

        if ($limit !== null && $offset !== null) {
            $query = $this->db->get($this->DB, $limit, $offset);
        } else {
            $query = $this->db->get($this->DB);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($this->get_related == FALSE) {
                return ($query->result_array());
            } else {
                return $this->get_related($query->result_array(), $this->fields);
            }
        }
    }

    public function get_by_ids($ids = null, $limit = null, $offset = null, $select = FALSE, $column = "id")
    {
        $this->db->trans_start();

        if ($select !== FALSE) {
            $this->db->select($select);
        } else {
            if (isset($this->select)) {
                $this->db->select($this->select);
            }
        }

        if (count($this->get_criteria) > 0) {
            $this->db->group_start();
            foreach ($this->get_criteria as $key => $value) {
                $this->db->where($key, $value);
            }
            $this->db->group_end();
        }

        if (count($this->like_criteria) > 0) {
            $this->db->group_start();

            $check_first = 1;
            foreach ($this->like_criteria as $key => $value) {
                if ($check_first === 1) {
                    $this->db->like($key, $value);
                } else {
                    $this->db->or_like($key, $value);
                }
                $check_first += 1;
            }

            $this->db->group_end();
        }

        $this->db->where_in($column, $ids);

        if (isset($this->order)) {
            if ($this->order != FALSE) {
                if (is_array($this->order)) {
                    $column = element('column', $this->order, FALSE);
                    $sort = element('sort', $this->order, "desc");
                    if ($column !== FALSE) {
                        $this->db->order_by($column, $sort);
                    }
                } elseif (is_string($this->order)) {
                    $column = $this->order;
                    $sort = "desc";
                    if ($column !== FALSE) {
                        $this->db->order_by($column, $sort);
                    }
                }

            }
        } else {
            $this->db->order_by("id", "desc");
        }


        if ($limit !== null && $offset !== null) {
            $query = $this->db->get($this->DB, $limit, $offset);
        } else {
            $query = $this->db->get($this->DB);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($this->get_related == FALSE) {
                return ($query->result_array());
            } else {
                return $this->get_related($query->result_array(), $this->fields);
            }
        }
    }


    public function get_related_oo($related_id, $table, $select = "*")
    {
        $this->db->trans_start();

        $this->db->select($select);
        $this->db->where("id", $related_id);
        $query = $this->db->get($table);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return $query->result_array();
        }

    }

    public function get_related_on($related_id, $table, $column, $criteria = array(), $select = "*")
    {
        $this->db->trans_start();

        $this->db->select($select);
        $this->db->where($column, $related_id);

        foreach ($criteria as $key => $value) {
            $this->db->where($key, $value);
        }

        $query = $this->db->get($table);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }

    public function get_related_nn($related_id, $table = FALSE, $column, $criteria, $select, $middle_table, $middle_column, $middle_criteria)
    {
        $this->db->trans_start();

        $this->db->select($middle_column);
        $this->db->where($column, $related_id);

        foreach ($middle_criteria as $key => $value) {
            $this->db->where($key, $value);
        }

        $query = $this->db->get($middle_table);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $ids = array();
            foreach ($query->result_array() as $item) {
                $ids[] = $item[$middle_column];
            }

            if (count($ids) == 0) {
                return FALSE;
            }
            if ($table === FALSE) {
                return $ids;
            } else {
                $this->db->trans_start();

                $this->db->select($select);

                $this->db->where_in("id", $ids);

                foreach ($criteria as $key => $value) {
                    $this->db->where($key, $value);
                }

                $query = $this->db->get($table);

                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    return FALSE;
                } else {
                    return $query->result_array();
                }
            }
        }
    }


    public function count()
    {
        $this->db->trans_start();

        foreach ($this->count_criteria as $key => $value) {
            $this->db->where($key, $value);
        }

        if (isset($this->where_in_criteria)) {
            $column = element("column", $this->where_in_criteria, FALSE);
            $ids = element("ids", $this->where_in_criteria, FALSE);
            if ($column !== FALSE && $ids !== FALSE) {
                $this->db->where_in($column, $ids);
            } elseif ($column === FALSE && $ids === FALSE && is_array($this->where_in_criteria)) {
                foreach ($this->where_in_criteria as $column => $ids) {
                    $this->db->where_in($column, $ids);
                }
            }
        }

        $count = $this->db->count_all_results($this->DB);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return $count;
        }
    }

    public function query($query, $param = array(), $have_result = FALSE)
    {
        $this->db->trans_start();

        $result = $this->db->query($query, $param);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            if ($have_result) {
                return $result->result_array();
            } else {
                return TRUE;
            }
        }
    }
}