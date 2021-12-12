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
                                <a href="./browse/genre.html" class="list_item">
                                    <?php 
						            $sql = "select * from genres";
						            $result = $connect->query($sql);
						
						            if ($result->num_rows > 0) {
						            // output data of each row
						            while($row = $result->fetch_assoc()) {
                                        echo '
                                        <a href="./browse/genre.html" class="list_item">
                                            <img src="./admin/upload/genre/'.$row['image'].'" alt="" />
                                            <span class="item_name">'.$row["genre_name"].'</span>
                                        </a>
                                    ';}
						           }
					            ?>

                                    <a class="list_item">
                                        <img src="https://cdn.uppbeat.io/images/UppBeat_Playlists_Beats_Stylish-Beats.jpg"
                                            alt="" />
                                        <span class="item_name">Nhạc Rap</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="content_wrapper-item">
                        <span class="item_title"> Thể loại </span>
                        <div class="slick-initialized slick-slider">
                            <div class="slick-list">
                                <a class="list_item">
                                    <img src="https://cdn.uppbeat.io/images/UppBeat_Playlists_Beats_Vintage-Beats.jpg"
                                        alt="" />
                                    <span class="item_name">Nhạc Vintage</span>
                                </a>
                                <a class="list_item">
                                    <img src="https://cdn.uppbeat.io/images/UppBeat_Playlists_Beats_Chillhop-Beats.jpg"
                                        alt="" />
                                    <span class="item_name">Nhạc Chillhop</span>
                                </a>
                                <a class="list_item">
                                    <img src="https://cdn.uppbeat.io/images/UppBeat_Playlists_Beats_Hip-Hop-Beats.jpg"
                                        alt="" />
                                    <span class="item_name">Nhạc Hiphop</span>
                                </a>
                                <a class="list_item">
                                    <img src="https://cdn.uppbeat.io/images/UppBeat_Playlists_Beats_Lo-fi-Beats.jpg"
                                        alt="" />
                                    <span class="item_name">Nhạc Lo-fi</span>
                                </a>
                                <a class="list_item">
                                    <img src="https://cdn.uppbeat.io/images/UppBeat_Playlists_Beats_Trap.jpg" alt="" />
                                    <span class="item_name">Nhạc Trap</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content_wrapper-item">
                        <span class="item_title"> Thể loại </span>
                        <div class="slick-initialized slick-slider"></div>
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