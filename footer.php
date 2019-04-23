 <footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
        <div class="am-footer-miscs ">
            <p>网站仅作个人测试用，已备案</p>
            <p>粤ICP备18018686号</p>
        </div>
    </footer>
    <!--底部-->
    <div data-am-widget="navbar" class="am-navbar am-cf my-nav-footer " id="">
        <ul class="am-navbar-nav am-cf am-avg-sm-4 my-footer-ul">
            <li>
                <a href="../index.php" class="">
                    <span class="am-icon-home"></span>
                    <span class="am-navbar-label">首页</span>
                </a>
            </li>
            <li>
                <?php
               if(isset($_COOKIE['admin']))
                   echo  '<a href="../admin/new_chat.php" class="">';
                else
            echo  '<a href="../chat/chat.php" class="">';
                ?>

                    <span class=" am-icon-comments"></span>
                    <span class="am-navbar-label">在线联系</span>
                </a>
            </li>
            <li style="position:relative">
                <a href="javascript:;" onClick="showFooterNav();" class="">
                    <span class="am-icon-user"></span>
                    <span class="am-navbar-label">会员中心</span>
                </a>
                <div class="footer-nav" id="footNav">
                    <span class="am-icon-user"><a href="../user/user.php">个人资料</a></span>
                    <span class="am-icon-power-off"><a href="../login/logout.php">安全退出</a></span>
                </div>
            </li>
            <li>
                <a href="../goods/BuysIndex.php" class="">
                    <span class="am-icon-shopping-cart"></span>
                    <span class="am-navbar-label">结算</span>
                </a>
            </li>

        </ul>
        <script>
            function showFooterNav(){
                $("#footNav").toggle();
            }
        </script>
    </div>
</div>
</body>
</html>

