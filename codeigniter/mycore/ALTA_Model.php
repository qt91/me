<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ALTA_Model extends CI_Model
{
    var $tbl;
    var $id;
    function __construct($id,$tbl)
    {
        parent::__construct();
        $this->tbl = $tbl;
        $this->id = $id; 
    }

    /**
    * ================================================================================================================================
    * Get data user form ID
    * @param id: ID cần select
    * @param bool $flag -Nếu bằng 0 trả về True/False
    *                  - Nếu bằng 1 trả về ID hoặc False
    *                  - Nếu bằng 2 trả về Dữ liệu hoặc False
    */
    function select_where_id($id, $flag = 0)
    {
        $sql = "SELECT * FROM $this->tbl WHERE $this->id = ?";
        $query = $this->db->query($sql,array($id));

        if($query->num_rows() > 0){
            if($flag == 0){
                return true;
            }elseif($flag == 1){
                $data = $query->row(0,'array'); 
                return $data[$this->id];
            }elseif($flag == 2){
                return $query->row(0,'array');
            }
        }
        return false;
    }

    /**
    * ================================================================================================================================
    * Select where
    * @param string $where Tên field
    * @param string $value Giá trị cho field trên
    * @param string $specified biểu thức so sánh
    * @param bool $flag -Nếu bằng 0 trả về True/False
    *                  - Nếu bằng 1 trả về ID hoặc False
    *                  - Nếu bằng 2 trả về Dữ liệu hoặc False
    */
    function select_where($where, $value,$specified = '=', $flag){
        $sql = "SELECT * FROM $this->tbl WHERE $where $specified ?";
        $query = $this->db->query($sql, array($value));

        if($query->num_rows() > 0){
            if($flag == 0){
                return true;
            }elseif($flag == 1){
                $data = $query->row(0,'array'); 
                return $data[$this->id];
            }elseif($flag == 2){
                return $query->row(0,'array');
            }
        }
        return false;
    }

    function select_all(){
        
    }

    /**
     * ================================================================================================================================
     * Them moi dong du lieu, truyen array data vao, $flag = true return True or False, bang false retunr ve dong duoc insert
     * @param bool $flag -Nếu bằng 0 trả về True/False
     *                  - Nếu bằng 1 trả về ID vừa thêm vào hoặc False
     *                  - Nếu bằng 2 trả về Dữ liệu vừa Insert hoặc False
     * 
     */
    function insert($data,$flag = 0)
    {
        $this->db->insert($this->tbl,$data);
        $id_insert = $this->db->insert_id();
        if($this->db->affected_rows() > 0){
            if($flag == 0){
                return $id_insert;
            }elseif($flag == 1){
                return true;
            }elseif ($flag == 2) {
                $sql = "SELECT * FROM $this->tbl WHERE $this->id = ?";
                $query = $this->db->query($sql,array($id_insert));
                if($query->num_rows() > 0){
                    return $query->row(0,'array');
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }  
    }

    /**
     * Cap nhat du lieu voi du lieu truyen vao
     */
    function update($data){
        $this->db->where($this->id,$data[$this->id]);
        unset($data[$this->id]);
        $this->db->update($this->tbl,$data);
        $Effect = $this->db->affected_rows();
        if($Effect == 1)
            return true;
        return false;
    }

    /**
     * Xoa ngui dung qua ID
     */
    function delete($id)
    {
        $sql = "DELETE FROM $this->tbl WHERE $this->id = ?";
        $this->db->query($sql,array($id));
        if($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    //============DANH RIENG============================================================
    function get_from_connect_id($connect_id){
        $sql = "SELECT * FROM $this->tbl WHERE query_id = ?";
        $query = $this->db->query($sql,array($connect_id));
        if(count($query->result_array()) > 0)
            return $query->result_array();
        return false;
    }
}

?>