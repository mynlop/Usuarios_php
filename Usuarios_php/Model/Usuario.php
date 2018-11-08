<?php
    require_once 'LoginDB.php';

    Class Usuario{
        private $id;
        private $nombre;
        private $apellido;
        private $email;
        private $pass;
        private $img;

        function __construct($id, $nombre, $apellido, $email, $pass, $img){
            $this-> id          = $id;
            $this-> nombre      = $nombre;
            $this-> apellido    = $apellido;
            $this-> email       = $email;
            $this-> pass        = $pass;
            $this-> img         = $img;
        }

        public function getId(){
            return $this-> id;
        }
        public function getNombre(){
            return $this-> nombre;
        }
        public function getApellido(){
            return $this-> apellido;
        }
        public function getEmail(){
            return $this-> email;
        }
        public function getImg(){
            return $this-> img;
        }

        public function comprobarUsuario(){
            $conexion = LoginDB::connectDB();
            $comprobar = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email && pass = :pass " );
            $comprobar-> bindParam(':email' , $this-> email);
            $comprobar-> bindParam(':pass',   $this-> sha1($this-> pass));
            $comprobar-> execute();
            if($comprobar-> rowCount() > 0){
                $rows = $comprobar-> fetchAll();
            }else{
                $rows[0] = 0;
            }
            return $rows;
        }

        public function comprobarEmail(){
            $conexion = LoginDB::connectDB();
            $comprobar = $conexion-> prepare("SELECT * FROM usuarios WHERE email= :email");
            $comprobar-> bindParam(':email',$this-> email);
            $comprobar-> execute();
            if($comprobar-> rowCount() > 0){
              $rows[0] = 1;
            }
            return $rows;
          }

          public function insertar(){
            $conexion = LoginDB::connectDB();
            $insertar = $conexion-> prepare("INSERT INTO usuarios (nombre, apellido, email, pass, img) VALUES (:nombre, :apellido, :email, :pass, :img)");
            $insertar-> bindParam(':nombre', $this-> nombre, PDO::PARAM_STR);
            $insertar-> bindParam(':apellido', $this-> apellido, PDO::PARAM_STR);
            $insertar-> bindParam(':email', $this-> email, PDO::PARAM_STR);
            $insertar-> bindParam(':pass',sha1($this-> pass), PDO::PARAM_STR);
            $insertar-> bindParam(':img', $this-> img, PDO::PARAM_STR);
            $insertar-> execute();
          }

          public function eliminar(){
            $conexion = LoginDB::connectDB();
            $borrar = $conexion-> prepare("DELETE FROM usuarios WHERE id= :id");
            $borrar-> bindParam(':id', $this-> id, PDO::PARAM_INT );
            $borrar-> execute();
          }

          public function modificar(){
            $conexion = LoginDB::connectDB();
            $editar = $conexion-> prepare("UPDATE usuarios SET nombre= :nombre, apellido= :apellido, img = :img WHERE id= :id");
            $editar-> bindParam(':nombre', $this-> nombre, PDO::PARAM_STR);
            $editar-> bindParam(':apellido', $this-> apellido,PDO::PARAM_STR);
            $editar-> bindParam(':img', $this-> img, PDO::PARAM_STR);
            $editar-> bindParam(':id', $this-> id, PDO::PARAM_INT);
            $editar-> execute();
          }

          public function modificarPass(){
            $conexion = LoginDB::connectDB();
            $editar = $conexion-> prepare("UPDATE usuarios SET pass = :pass WHERE id = :id");
            $editar-> bindParam(':pass', sha1($this-> pass), PDO::PARAM_STR);
            $editar-> bindParam(':id', $this-> id,PDO::PARAM_INT);
            $editar-> execute();
          }

          public function getUsuarios(){
            $conexion = LoginDB::connectDB();
            $obtener = $conexion-> query("SELECT * FROM usuarios");
            $rows = $obtener-> fetchAll();
            return $rows;
          }

          public function getUsuariobyID(){
            $conexion = LoginDB::connectDB();
            $obtener = $conexion-> query("SELECT * FROM usuarios WHERE id=" .$this-> id);
            $rows = $obtener-> fetchAll();
            return $rows;
          }
    }


?>