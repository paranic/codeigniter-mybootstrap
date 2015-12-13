<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table_name = 'undefined';

	public $record_id;
	public $insert_at;
	public $update_at;
	public $deleted_at;

	public function __construct($properties = [])
	{
		parent::__construct();
		$this->set_properties($properties);
	}

	public function set_properties($properties = [])
	{
		foreach ($properties as $property => $value)
		{
			$this->$property = $value;
		}
	}

	private function nullify_empty_properties()
	{
		foreach (get_object_vars($this) as $property => $value)
		{
			if (!is_string($value)) continue;
			if (strlen(trim($this->$property)) == 0)
			{
				$this->$property = NULL;
			}
		}
	}

	public function get_record($where = [], $order_by = [])
	{
		if (!$where) return NULL;

		$called_class = get_called_class();

		foreach ($order_by as $property => $direction)
		{
			$this->db->order_by($property, $direction);
		}

		return $this->db->get_where($this->table_name, $where)->custom_row_object(0, $called_class);
	}

	public function get_records($where = [], $order_by = [])
	{
		$called_class = get_called_class();
		$where = array_merge($where, ['deleted_at' => NULL]);
		foreach ($order_by as $property => $direction)
		{
			$this->db->order_by($property, $direction);
		}

		return $this->db->get_where($this->table_name, $where)->custom_result_object($called_class);
	}

	public function get_deleted_records($where = [])
	{
		$called_class = get_called_class();
		$where = array_merge($where, ['deleted_at IS NOT' => NULL]);

		return $this->db->get_where($this->table_name, $where)->custom_result_object($called_class);
	}

	public function save()
	{
		if ((int)$this->record_id > 0)
		{
			$this->update();
		}
		else
		{
			$this->insert();
		}
	}

	public function update()
	{
		$this->nullify_empty_properties();

		$datetime_now = new DateTime('now', new DateTimeZone('UTC'));
		$this->update_at = $datetime_now->format('Y-m-d H:i:s');

		$this->db->update($this->table_name, $this, ['record_id' => $this->record_id]);
	}

	public function insert()
	{
		$this->nullify_empty_properties();

		$datetime_now = new DateTime('now', new DateTimeZone('UTC'));
		$this->insert_at = $datetime_now->format('Y-m-d H:i:s');
		$this->update_at = $datetime_now->format('Y-m-d H:i:s');

		$this->db->insert($this->table_name, $this);

		$this->record_id = $this->db->insert_id();
	}

	public function delete()
	{
		return $this->db->delete($this->table_name, ['record_id' => $this->record_id]);
	}

	public function soft_delete()
	{
		$datetime_now = new DateTime('now', new DateTimeZone('UTC'));
		$this->deleted_at = $datetime_now->format('Y-m-d H:i:s');
		$this->update_at = $datetime_now->format('Y-m-d H:i:s');

		$this->db->update($this->table_name, $this, ['record_id' => $this->record_id]);
	}

	public function un_delete()
	{
		$this->deleted_at = NULL;

		$this->db->update($this->table_name, $this, ['record_id' => $this->record_id]);
	}

	public function is_unique($properties = [])
	{
		if (empty($properties)) return FALSE;

		$where = [];
		foreach ($properties as $property)
		{
			$where[$property] = $this->$property;
		}

		return !(bool)$this->db->get_where($this->table_name, $where)->num_rows();
	}

	public function is_empty($properties = [])
	{
		if (empty($properties)) return TRUE;

		foreach ($properties as $property)
		{
			if (!empty($this->$property)) return FALSE;
		}

		return TRUE;
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */