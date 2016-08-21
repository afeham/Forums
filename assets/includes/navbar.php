<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" rel="index" href="/index.php" title="Home Page">
                <img style="max-width:200px; margin-top: -22px;"
                     src="http://i.imgur.com/8Hmgp2W.png">
            </a>

        </div>


        <div class="navbar-collapse collapse navbar-responsive-collapse">

            <ul class="nav navbar-nav">

                <li><a href="/forum"><i class="fa fa-comments-o"></i> Forums</a></li>

                <li><a href="/games"><i class="fa fa-users"></i> Games</a></li>

                <li><a href="/docs"><i class="fa fa-exclamation"></i> Docs</a></li>

                <li><a href="#"><i class="fa fa-book"></i> Leaderboard</a></li>

                <li><a href="/support"><i class="fa fa-download"></i> Help</a></li>

                <?php

                if (isset($_SESSION['Username'])) {

                    $rank = $_SESSION['Rank'];
                    if (strtolower($rank) == "owner"
                        || strtolower($rank) == "admin"
                        || strtolower($rank) == "padmin"
                        || strtolower($rank) == "developer"
                        || strtolower($rank) == "smod"
                        || strtolower($rank) == "mod"
                    ) {

                        ?>

                        <li><a href="/panel"><i class="fa fa-terminal"></i> Panel</a></li>

                    <?php

                    }

                }

                ?>

            </ul>



            <?php



            if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {


                ?>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">

                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['Username']; ?><b
                                class="caret"></b></a>

                        <div class="dropdown-menu" style="padding: 15px; min-width: 300px">

                            <form action="/logout.php" method="post">

                                <h3 style="margin-top: 0px">Welcome, <?php echo $_SESSION['Username']; ?>!</h3>

                                <p>Rank: <?php echo ucwords($_SESSION['Rank']); ?></p>

                                <p><?php
                                    $user = $_SESSION['Username'];

                                    echo "<a href='/profile?user=$user'>View Profile</a>"; ?></p>

                                <p><a href="/user/account/index.php">Account Settings</a></p>

                                <input type="hidden" name="redirect" value="/"/>

                                <input type="submit" class="btn btn-primary" value="Logout" name="logout" id="logout">

                            </form>

                        </div>

                    </li>

                </ul>

            <?php

            } else {

                ?>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">

                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-user"></span><b class="caret"></b></a>

                        <div class="dropdown-menu" style="padding: 15px; min-width: 300px">

                            <form action="/login.php" method="post" name="loginform" id="loginform">

                                <h3 style="margin-top: 0px">Login</h3>

                                <input class="form-control" type="text" name="username" placeholder="Username"
                                       id="username"/><br/>

                                <input class="form-control" type="password" name="password" placeholder="Password"
                                       id="password"/><br/>

                                <div><a href="/forgot">Forgot Password</a></div>
                                <br/>

                                <input type="hidden" name="redirect" value="/"/>

                                <input type="submit" class="btn btn-primary" value="Login" name="login" id="login">

                                <a href="/register.php" class="btn btn-default">Register</a>


                            </form>

                        </div>

                    </li>

                </ul>



            <?php

            }

            ?>

            <form class="hidden-sm navbar-form navbar-right" role="search" id="usersearchform" action="/user/search.php"
                  method="POST">

                <div class="form-group">

                    <input ng-model="searchtext" type="text" id="user" class="form-control" placeholder="find profile"
                           required data-validation-required-message="Specify a username" maxlength="60" name="user"/>

                </div>

            </form>

        </div>

        <!-- /.navbar-collapse -->

    </div>

    <!-- /.container -->

</nav>

<div style="padding-bottom: 30px;"></div>
