<?php

   /**
    *
    */
   class process_data  {

     private $_conn;
	  public function connect()
	  {
		  if(!$this->_conn)
		  {

			$this->_conn =mysqli_connect('localhost','root','123456','nhac') or die("Lỗi kết nối");

			mysqli_query($this->_conn, "SET character_set_results='utf8',character_set_client='utf8',character_set_database='utf8',character_set_server='utf8'");

		  }

	  }
	  public function disconect()
	  {
		  if(!$this->_conn)
		  {

			 mysql_close($this->_conn);
		  }
	  }

    public function insert($table,$data)
	    {

    $this->connect();
	 $list_key ="";
	 $list_value="";

	 foreach ($data as $key => $value) {

	 $list_key .=",$key";
		 $list_value .=",'".mysql_escape_string($value)."'";

	 }
  $sql ='insert into '.$table.' ('.trim($list_key,',').') values ('.trim($list_value,',').')';
  //echo $sql;
  return mysqli_query($this->_conn, $sql);


    }

		public function update($table,$data,$where)
		{
			$this->connect();
			$sql='';
			foreach ($data as $key => $value) {
		       $sql .="$key = '".mysql_escape_string($value)."',";
			}

			$sql ='update '.$table.' set '.trim($sql,',').' where '.$where;
			//echo "$sql";
			return mysqli_query($this->_conn, $sql);
		}


	public function delete_all($sql)
	{
		$this->connect();
		return mysqli_query($this->_conn, $sql);
	}

	public function delete($table,$where)
		{
			$this->connect();
			$sql ='delete from '.$table.' where '.$where;
			//echo "$sql";
			 $result =mysqli_query($this->_conn, $sql);
			 if(!$result)
			 {
			 	echo "Không thể xóa dữ liệu";

			 }
			 return mysqli_query($this->_conn, $sql);
		}

		public function get_list($sql)
		{
        $this->connect();

		return mysqli_query($this->_conn, $sql);

		}

		function get_row($sql)
{
    // Kết nối
    $this->connect();

    $result = mysqli_query($this->_conn, $sql);

    if (!$result){
        die ('Câu truy vấn bị sai');
    }

    $row = mysqli_fetch_assoc($result);

    // Xóa kết quả khỏi bộ nhớ
    mysqli_free_result($result);

    if ($row){
        return $row;
    }

    return false;
}

   }



?>