<?php namespace Classes;

class Objednavky {

	protected $db;

	public function __construct() {
		global $db;

		$this->db = $db;
	}

	public function add($kosik, $meno, $adresa, $email, $telefon) {
        $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);

		$sql = 'INSERT INTO `objednavky` 
				(kosik, datum, kupujuci_meno, kupujuci_adresa, kupujuci_email, kupujuci_telefon, userId)
				VALUES (:kosik, :datum, :meno, :adresa,
					:email, :telefon, :userId )';

		$query = $this->db->prepare($sql);

		if (!$query) {
		    print_r($this->db->errorInfo());
		}

		$query->execute(array(
			':kosik' => serialize($kosik),
			':datum' => time(),
			':meno' => $meno,
			':adresa' => $adresa,
			':email' => $email,
			':telefon' => $telefon,
			':userId' => isset($_SESSION['user']) ? $_SESSION['user'] : NULL
		));

		return true;
	}


	public function getByUserId($id) {
		$sql = 'SELECT * FROM objednavky WHERE userId = :userId';
		$query = $this->db->prepare($sql);
		$query->execute(array(
			':userId' => $id,
		));
		$objednavky = $query->fetchAll();
		return $objednavky;
	}


	public function getObjednavkaById($id) {

		global $db;

		$sql = 'SELECT * FROM objednavky WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute(array(
			':id' => $id,
		));
		$objednavka = $query->fetch();
		return $objednavka;
	}



	public function sendMail($subject, $from, $to, $message) {
		$transport = \Swift_MailTransport::newInstance();

		// Create the Mailer using your created Transport
		$mailer = \Swift_Mailer::newInstance($transport);

		// Create a message
		$message = \Swift_Message::newInstance($subject)
		  ->setFrom($from)
		  ->setTo($to)
		  ->setBody($message)
		  ;

		// Send the message
		$result = $mailer->send($message);
		var_dump($result);
	}
}
