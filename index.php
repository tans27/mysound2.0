<?php
session_start();
// if(!isset($_SESSION["user"])){
//     header("location:./account/login/login.php");
// }
include "./layout/header.php";
require_once './admin/connect.php';
$connect = ConnectDB();

?>

<div class="main_content">
    <section class="home_page">
        <div class="container">
            <div class="home_page-title">
                <span class="title_heading">Âm nhạc miễn phí tới mọi người</span>
                <span class="title_sub-heading">Nó là của bạn.</span>
            </div>
            <div class="home_page-content">
                <div class="content_wrapper">
                    <div class="content_wrapper-item">
                        <span class="item_title"> Khám phá </span>
                        <div class="slick-initialized slick-slider">
                            <div class="slick-list">
                                    <?php
                                    $sql = "select * from genres";
                                    $result = $connect->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo '
                                                <a href="./browse/genre.php?id='.$row['id'].'" class="list_item">
                                                    <img src="./admin/upload/genre/' . $row['image'] . '" alt="" />
                                                    <span class="item_name">' . $row["genre_name"] . '</span>
                                                </a>
                                            ';
                                        }
                                        
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="content_wrapper-item">
                        <span class="item_title"> Chào Người Dùng Mới </span>
                        <div class="slick-initialized slick-slider">
                            <div class="slick-list">
                            <?php
                                    $sql1 = "select * from user";
                                    $result1 = $connect->query($sql1);

                                    if ($result1->num_rows > 0) {
                                        // output data of each row
                                        while ($acc = $result1->fetch_assoc()) {
                                            echo '
                                                <a class="list_item" href="./browse/user.php?user='.$acc['username_user'].'">
                                                ';
                                                if (isset($acc['avatar_user']) && $acc['avatar_user']){
                                                    echo' 
                                                    <img src="./admin/upload/user/' . $acc['avatar_user'] . '"
                                                    ';}
                                                    else{
                                                        echo'
                                                    <img src="./assets/images/default-avatar.jpg"';
                                                    };
                                                    echo'
                                                        alt="" />
                                                    <span class="item_name"><i>@' . $acc['username_user'] . '</i></span>
                                                </a>';}}?>
                            </div>
                        </div>
                    </div>
                    <div class="content_wrapper-item">
                        <span class="item_title"> Playlist Ca sĩ </span>
                        <div class="slick-initialized slick-slider"></div>
                        <div class="slick-list">
                            <?php
                                    $sql2 = "SELECT artist.artist_name, musics.artist, artist.image, COUNT(musics.artist) as c FROM artist, musics WHERE artist.artist_name=musics.artist GROUP BY artist ORDER BY c DESC LIMIT 10;";
                                    $result2 = $connect->query($sql2);

                                    if ($result2->num_rows > 0) {
                                        // output data of each row
                                        while ($art = $result2->fetch_assoc()) {
                                            echo '
                                                <a class="list_item" href="./browse/artist.php?artist='.$art['artist'].'">
                                                ';
                                                if (isset($art['image']) && $art['image']){
                                                    echo' 
                                                    <img src="./admin/upload/artist/' . $art['image'] . '"
                                                    ';}
                                                    else{
                                                        echo'
                                                    <img src="./assets/images/logo-thumb.png"';
                                                    };
                                                    echo'
                                                        alt="" />
                                                    <span class="item_name">'. $art['artist'] . '</span>
                                                </a>';}}?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>

<?php
include './layout/footer.php';