
<?

	namespace APE\Site\Model;
	
	require_once('model/Manager.php');

	class HomeManager extends Manager
	{
		function showHome() {
			$dbh = $this->dbhConnect();
		}
	} 