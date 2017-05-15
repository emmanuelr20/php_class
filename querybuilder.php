<?php
	class QueryBuilder
	{
		protected $pdo;

		function __construct(PDO $pdo)
		{
			$this->pdo = $pdo;
		}

		public function find($table, int $id)
		{
			$stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id={$id}");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_CLASS);
			return $result;
		}

		public function where($table, $field, $value)
		{
			$stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$field} = '$value'");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_CLASS);
			return $result;
		}

		public function update($table, $arr = [], int $id = null)
		{
			$fields = '';
			foreach ($arr as $key => $value) {
				$fields .= $key .' = '.'\'' . $value . '\', ';
			}
			$fields = substr($fields, 0, -2);
			$sql = "UPDATE {$table} SET " . $fields;
			if ($id == null){
				$stmt = $this->pdo->prepare($sql);
			} else{
				$stmt = $this->pdo->prepare($sql . "WHERE id={$id}");
			}	
			$stmt->execute();
			return;
		}

		public function delete($table, int $id)
		{
			$stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE id={$id}");
			$stmt->execute();
		}
	}
?>