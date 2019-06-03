<?php 
/*
  Gerenciador da database
*/
class Database {

	public function getConnection()
	{
		return new MySQL();
	}

}
