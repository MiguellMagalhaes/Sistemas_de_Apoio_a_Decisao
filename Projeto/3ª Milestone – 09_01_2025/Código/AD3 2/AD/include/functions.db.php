<?php


function mostraProdutos($filtro, $larguraColunas = 0, $order = 'nome') {
    switch($filtro) {
        case 'all': $query = "SELECT * FROM produtos WHERE activo = 1 ORDER BY $order";
                    break;
        case 'men': $query = "SELECT * FROM produtos WHERE idCatalogo = 1 AND activo = 1 ORDER BY $order";
                    break;
        case 'women': $query = "SELECT * FROM produtos WHERE idCatalogo = 2 AND activo = 1 ORDER BY $order";
                    break;
        case 'kids': $query = "SELECT * FROM produtos WHERE idCatalogo = 3 AND activo = 1 ORDER BY $order";
                    break;
    }

    $res = my_query($query);
    $numRegistos = count($res);
    foreach($res as $k => $produto) {

        if($larguraColunas) {
            echo '<div class="col-lg-' . $larguraColunas . '">';
        }
        
        echo '
            <div class="item">
                <div class="thumb">
                    <div class="hover-content">
                        <ul>
                            <li><a href="single-product.php?id=' . $produto['id'] . '"><i class="fa fa-eye"></i></a></li>
                            <li><a href="single-product.php?id=' . $produto['id'] . '"><i class="fa fa-star"></i></a></li>
                            <li><a href="single-product.php?id=' . $produto['id'] . '"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <img src="upload/produtos/' . $produto['foto'] . '" alt="">
                </div>
                <div class="down-content">
                    <h4>' . $produto['nome'] . '</h4>
                    <span>' . $produto['preco'] . '</span>
                    <ul class="stars">';

        for($i=0; $i<$produto['stars']; $i++) {
            echo '<li><i class="fa fa-star"></i></li>';
        }
                        
        echo '
                    </ul>
                </div>
            </div>';

        if($larguraColunas) {
            echo '</div>';
        }
    }
}

function getUrlFriendly($url)
{

$rootURL = 'http://localhost/AD';

$queryUrl = parse_url($url, PHP_URL_QUERY);
parse_str($queryUrl, $params);
$urlWithoutQuery = preg_replace('/\?.*/', '', $url);
$sql = "SELECT * FROM `seo` WHERE `url` = '$urlWithoutQuery'";
$result = my_query($sql);
if (count($result) > 0) {
$urlFriendly = $result[0]['urlfriendly'];
foreach ($params as $key => $parm) {
if (str_contains($urlFriendly, '{' . $key . '}')) {
$urlFriendly = str_replace('{' . $key . '}', $parm, $urlFriendly);
unset($params[$key]);
}
}
return $rootURL . $urlFriendly . (count($params) > 0 ? '?' . http_build_query($params) : '');
} else {
return $rootURL . '/' . $url;
}
}



if (!function_exists('str_contains')) {
  function str_contains($haystack, $needle)
  {
      return '' === $needle || false !== strpos($haystack, $needle);
  }
}
 
?>