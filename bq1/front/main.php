<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
        <?php
            $ads = $AD->all(['sh'=>1]);
            foreach ($ads as $ad) {
                echo $ad['text'];
                echo str_repeat("&nbsp",4);
            }
        ?>
    </marquee>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
        </div>
    </div>
    <div
        style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
            <?php
                if($NEWS->count(['sh'=>1])>5){
                    echo "<a href='index.php?do=news' style='float:right'> MORE... </a>";
                }
            ?>
        </span>
        <ul class="ssaa" style="list-style-type:decimal;">
        <?php
            $news = $NEWS->all(['sh'=>1]," limit 5");
            foreach ($news as $list) {
                echo "<li>";
                echo mb_substr($list['text'],0,10);
                    echo "<span class='all' style='display:none'>";
                    echo $list['text'];
                    echo "</span>"; 
                echo "</li>";
            }
        ?>    
        </ul>
        
        <!-- 彈出視窗 -->
        <div id="altt"
            style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
        </div>
        <script>
        var lin = new Array();
        <?php
            $mvs = $MVIM->all(['sh'=>1]);
            foreach ($mvs as $mv) {
                echo "lin.push('upload/{$mv['img']}');";
            }
        ?>
        var now = 0;
        if (lin.length > 1) {
            // 不會馬上執行
            setInterval("ww()", 3000);
            //now = 1;
        }
        
        function ww() {
            // console.log("ww");
            $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
            
            //$("#mwww").attr("src",lin[now])
            now++;
            if (now >= lin.length)
                now = 0;
        }

        ww();
    </script>
        <script>
            // 滑鼠移上來的時候的function
            $(".ssaa li").hover(
                function () {
                    // innerHTML 放一大堆的東西
                    // 把ssaa>.all 的東西放到#altt裡面
                    // 然後把#altt show出來
                    $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                    $("#altt").show()
                }
            )
            // 滑鼠離開
            // 把#altt的視窗關掉
            $(".ssaa li").mouseout(
                function () {
                    $("#altt").hide()
                }
            )
        </script>
    </div>
</div>
