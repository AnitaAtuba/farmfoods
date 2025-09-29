<?php 
            function sanitize($evilstr){
                $cleanstr = htmlentities($evilstr);
                return $cleanstr;
            }


?>