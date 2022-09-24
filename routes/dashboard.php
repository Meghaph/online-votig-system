<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location:../");
    }
    $userdata=$_SESSION['userdata'];
    $groupsdata=$_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status='<b style="color:red">Not Voted</b>';
    }
    else{
        $status='<b style="color: #006622">Voted</b>';
    }

?>
<html>
    <head>
        <title>online voting system</title>
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
    </head>
    <body>
        <style>
            body{
                background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(159,82,178,1) 34%, rgba(252,70,107,1) 100%);
                margin: 0;
                padding: 0;
                font-family: "Georgia, serif";
                box-sizing: "boarder-box";
            }
            #mainSection{
                height: 110px;
                width: 100%;
                background: white;
            }
            #headerSection{
                padding: 7px 2;

            }
            #backbtn{
                padding: 4px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
                float: left;
                transition-duration: 0.4s;
                border-radius: 5px;
                cursor: pointer;
                color:#fff;
                font-size:16px;
                letter-spacing: 2px;
                text-transform: uppercase;
                padding: 0px 40px;
                border-radius: 5px;
                background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 47%, rgba(0,57,255,1) 100%);
            }
            #backbtn:hover{
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                background-color: #ff3333; 
                
            }
            #logoutbtn{
                padding: 5px;
                border-radius: 5px;
                float: right;
                transition-duration: 0.4s;
                cursor: pointer;
                color:#fff;
                font-size:16px;
                letter-spacing: 2px;
                text-transform: uppercase;
                padding: 0px 40px;
                border-radius: 5px;
                background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 47%, rgba(0,57,255,1) 100%);           
            }
            #logoutbtn:hover{
                background-color: #ff3333;
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            }
            #endpg{
                padding: 5px;
                border-radius: 3px;
                float: right;
                transition-duration: 0.4s;
                cursor: pointer;
                color:#fff;
                font-size:16px;
                letter-spacing: 2px;
                text-transform: uppercase;
                padding: 15.5px 30px;
                border-radius: 5px;
                background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 47%, rgba(0,57,255,1) 100%);
            }
            #endpg:hover{
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            }
            a:link{
                color: white;
                text-decoration: none;
            }
            a:link, a:visited {
               color: white;
               text-align: center;
               text-decoration: none;
               display: inline-block;
}

            #profile{
                background-color: white;
                width: 30%;
                padding: 10px;
                float: left;
            }
            #group{
                background-color: white;
                width: 60%;
                padding: 10px;
                float: right;
            }
            #votebtn{
                padding: 10px;
                font-size: 16px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
                width: 120px;
                cursor: pointer;
                text-align: center;
                letter-spacing: 2px;
                text-transform: uppercase;
                padding: 10px 30px;
                border-radius: 5px;
                background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 47%, rgba(0,57,255,1) 100%);
            }
            #mainpanel{
                padding: 30px;

            }
            #voted{
                padding: 10px;
                font-size: 16px;
                color: Red;
                border-radius: 5px;
                width: 120px;
                cursor: pointer;
                text-align: center;
                letter-spacing: 2px;
                text-transform: uppercase;
                padding: 10px 30px;
                border-radius: 5px;
                background: #9999ff;
            }
        
        </style>



        <div id="mainSection">
            <center>
            <div id="headerSection"><p>
        <button id="backbtn"><p style="font-family: serif;"><a href="../">Back</a></p></button>
        <button id="logoutbtn"><p style="font-family: serif;"><a href="logout.php">Log out</a></p></button>
        <button id="endpg" style='margin-right:16px'><a href="endpage.html">Done</a></button>
        <h1><p style="font-family: Georgia, serif;">Online Voting System</p></h1>
            </div>
        </center>
            <div id="mainpanel">
            <div id="profile">
            <center><img src="../uploads/<?php echo $userdata['photo']?>"height="150" width="150"></center><br>
            <b><p style="font-family:zillaslab,palatino,Palatino Linotype,serif;line-height: 0px;">Name:</b><?php echo $userdata['name']?></p><br><br>
            <b><p style="font-family:zillaslab,palatino,Palatino Linotype,serif;line-height: 0px;">Mobile:</b><?php echo $userdata['mobile']?></p><br><br>
            <b><p style="font-family:zillaslab,palatino,Palatino Linotype,serif;line-height: 0px;">Email ID:</b><?php echo $userdata['email']?></p><br><br>
            <b><p style="font-family:zillaslab,palatino,Palatino Linotype,serif;line-height: 0px;">Status:</b><?php echo $status?></p><br><br>
        </div>
        <div id="group">
            <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                        <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                     <b><p style="font-family:Georgia, serif; line-height: 0px;">Group name:</b><?php echo $groupsdata[$i]['name']?></p><br><br>
                     <b><p style="font-family:Georgia, serif;line-height: 0px;">Total votes:</b><?php echo $groupsdata[$i]['votes']?></p><br><br>
                     <form action="../api/vote.php" method="POST">
                         <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                         <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                         <?php
                         if($_SESSION['userdata']['status']==0){
                             ?>
                             <input type="submit" name="votebtn" value="vote" id="votebtn">
                             <?php
                         }
                         else{
                            ?>
                            <button disabled type="button" name="votebtn" value="vote" id="voted">voted!!</button>
                            <?php
                         }
                         ?>
                    </div><hr>

                    <?php
                }
            }
            else{

            }
            ?>

        </div>
            </div>

    </body>

</html>