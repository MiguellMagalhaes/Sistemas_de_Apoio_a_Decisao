<?php
 escrevePost();

 function escrevePost() {
    $sql="SELECT * FROM news WHERE ativo = 1 ORDER BY id";
    $result = my_query($sql);

    foreach($result as $k => $v) {
        echo'<li class="col-md-4">
                                        <figure>
                                            <a href="blog-detail.php?id='.$v['id'].'"><img src="images/'.$v['image'].'" alt=""></a>
                                        </figure>
                                        <section>
                                            <h2><a href="blog-detail.php?id='.$v['id'].'">'.$v['title'].'</a></h2>
                                        </section>
                                        <div class="sportsmagazine-blog-grid-options">
                                            <a href="blog-detail.php?id='.$v['id'].'" class="sportsmagazine-blog-grid-thumb"><img src="extra-images/blog-thumb-1.jpg" alt=""> Julia Martyn</a>
                                        </div>
                                    </li>';
    }
 }
 ?>






                                    