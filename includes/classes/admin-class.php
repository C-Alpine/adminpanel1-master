<?php

    class Admins
    {

        private $dbh = null;

        public function __construct($db)
        {
            $this->dbh = $db->dbh;
        }

        public function loginAdmin($username, $password)
        {
            //Un-comment this to see a cryptogram of a password 
            // echo session::hashPassword($password);
            // die;
            $request = $this->dbh->prepare("SELECT username, password FROM admins WHERE username = ?");
            if($request->execute( array($username) ))
            {
                // This is an array of objects.
                // Remember we setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); in config/dbconnection.php
                $data = $request->fetchAll();

                // But if things are right, the array should contain only one object, the corresponding user
                // so, we can do this
                $data = $data[0];

                return session::passwordMatch($password, $data->password) ? true : false;

            }else{
                return false;
            }

        }

        /**
         * Check if the admin username is unique
         * If though we've set this criteria in our database,
         * It's good to make sure the user is not try that
         * @param   $username The username
         * @return Boolean If the username is already usedor not
         * 
         */
        public function adminExists( $username )
        {
            $request = $this->dbh->prepare("SELECT username FROM admins WHERE username = ?");
            $request->execute([$username]);
            $Admindata = $request->fetchAll();
            return sizeof($Admindata) != 0;
        }

        /**
         * Compare two passwords
         * @param String $password1, $password2 The two passwords
         * @return  Boolean Either true or false
         */

        public function ArePasswordsSame( $password1, $password2 )
        {
            return strcmp( $password1, $password2 ) == 0;
        }


        /**
         * Create a new row of admin
         * @param String $username New admin username
         * @param String $password New Admin password
         * @return Boolean The final state of the action
         * 
         */

        public function addNewAdmin($username, $password)
        {
            $request = $this->dbh->prepare("INSERT INTO admins (username, password) VALUES(?,?) ");

            // Do not forget to encrypt the pasword before saving
            return $request->execute([$username, session::hashPassword($password)]);
        }


        
        public function addNewCzlonek($fname, $lname, $sex, $bdate, $bplace, $sekcja, $adres, $imieo, $imiem, $tel, $telr, $mail, $pesel, $klasa, $wychowawca)
        {
            $request = $this->dbh->prepare("INSERT INTO czlonkowie (imie, nazwisko, plec, data_ur, miejsce_ur, nazwa_sekcji, adres, imie_ojca, imie_matki, tel, tel_r, mail, PESEL, klasa, wychowawca) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");

            // Do not forget to encrypt the pasword before saving
            return $request->execute([$fname, $lname, $sex, $bdate, $bplace, $sekcja, $adres, $imieo, $imiem, $tel, $telr, $mail, $pesel, $klasa, $wychowawca]);
        }



        public function updateCzlonek($id, $fname, $lname, $sex, $bdate, $bplace, $sekcja, $adres, $imieo, $imiem, $tel, $telr, $mail, $pesel, $klasa, $wychowawca)
        {
            $request = $this->dbh->prepare("UPDATE czlonkowie SET imie = ?, nazwisko = ?, plec = ?, data_ur = ?, miejsce_ur = ?, nazwa_sekcji = ?, adres = ?, imie_ojca = ?, imie_matki = ?, tel = ?, tel_r = ?, mail = ?, PESEL = ?, klasa = ?, wychowawca = ? WHERE id = ? ");

            // Do not forget to encrypt the pasword before saving
            return $request->execute([$fname, $lname, $sex, $bdate, $bplace, $sekcja, $adres, $imieo, $imiem, $tel, $telr, $mail, $pesel, $klasa, $wychowawca, $id]);
        }


        public function fetchCzlonek($limit = 100)
        {
            $request = $this->dbh->prepare("SELECT * FROM czlonkowie ORDER BY id LIMIT $limit");
            if ($request->execute()) {
                return $request->fetchAll();
            }
            return false;
        }

        public function getACzlonek($id)
        {
            if (is_int($id)) 
            {
                $request = $this->dbh->prepare("SELECT * FROM czlonkowie WHERE id = ?");
                if ($request->execute([$id])) {
                    return $request->fetchAll();
                }
                return false;
            }
            return false;
        }

        public function deleteCzlonek($id)
        {
            $request = $this->dbh->prepare("DELETE FROM czlonkowie WHERE id = ?");
            return $request->execute([$id]);
        }

    }