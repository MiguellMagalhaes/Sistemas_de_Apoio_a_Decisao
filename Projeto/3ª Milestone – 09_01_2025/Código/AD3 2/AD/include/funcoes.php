<?php
    function MostrarRedesSociais($ordem="id"){

            $sql = "SELECT * FROM redesociais WHERE ativo = '1' ORDER BY $ordem";
            $res = my_query($sql);
            foreach($res as $k => $v) {
                echo "<li><a href= " . $v['rede_url'] . " class='sportsmagazine-colorhover fa fa-" . $v['rede_nome'] . "-square'></a></li>";
            }

            
    }



?>

