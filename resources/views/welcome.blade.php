<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Football Website</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-***********" crossorigin="anonymous">
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation Bar -->
    <x-navbar />

    <!-- Hero Section -->
    <section class="bg-cover bg-center bg-gradient-to-b from-blue-600 to-blue-400 text-white py-24" style="background-image: url('images/hero-image.png');">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Fifa world Cup Morocco 2030</h1>
            <p class="text-lg md:text-xl mb-8">Get the latest updates on matches, teams, and players.</p>
            <a href="#" class="px-8 py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded-full">Explore
                Now</a>
        </div>
    </section>

    <section id="clubs">
        <div class="clubs-header">
            <h2>Clubs</h2>
            <p>Check out every club details and you may also participate in club giveaways</p>
        </div>
        <div class="clubs">
            <div class="club">
                <img class="club-logo"
                    src="https://png.pngtree.com/png-vector/20211030/ourmid/pngtree-round-country-flag-morocco-png-image_4016736.png"
                    alt="">
                <h4>Morocco</h4>
            </div>
            <div class="club">
                <img class="club-logo"
                    src="https://cdn11.bigcommerce.com/s-e2nupsxogj/images/stencil/1280x1280/products/6618/41010/wbseknzp4qhr5s5x5hzo__01790.1694825997.jpg?c=1"
                    alt="">
                <h4>Italy</h4>
            </div>
            <div class="club">
                <img class="club-logo"
                    src="data:image/jpeg;base64,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"
                    alt="">
                <h4>Spain</h4>
            </div>
            <div class="club">
                <img class="club-logo"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1LGFN2lH2bthaI-J6UIikoghH54gyfI7KchfW8E2qug&s"
                    alt="">
                <h4>Argentina</h4>
            </div>
            <div class="club">
                <img class="club-logo"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwdvqGPTWEKrbtHyNk3v-6a_9ue6tWIjiUGEGTVyIEUA&s"
                    alt="">
                <h4>Ecuador</h4>
            </div>
            <div class="club">
                <img class="club-logo"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Palestine.svg/800px-Flag_of_Palestine.svg.png"
                    alt="">
                <h4>palestine</h4>
            </div>
            <div class="club">
                <img class="club-logo"
                    src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTIjmGjaRVD2FMGb-e1JOXlAAMIXWVntEW0IGb96d8pat2yY_C-qWCbYwyisKIIzVyrUq6sLhfXoTM9v4pv9MhY2-1keeWBb42OI3BNDgILrt0S0_tE_dzYnO2Ko8dsOr08v2TsNPg&usqp=CAc"
                    alt="">
                <h4>Crystal Palace</h4>
            </div>
            <div class="club">
                <img class="club-logo"
                    src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSpkZJLseCe1f6aaP0F2n27glYDYQLy3yhZZYTLme3itlY-96wRDUjmeCsszQtaiWL3wYZAkCwm0MnTg9ZMEtu8EAHT_E3PeaVVkUeueLKVGaCtSEDHdDjgNh_IWFQeEe7Mib9MKEY&usqp=CAc"
                    alt="">
                <h4>Everton</h4>
            </div>
        </div>
    </section>
    <section id="players" class="players">
        <article class="player">
            <img src="images/players/player-1.png" alt="">
            <div class="player-info">
                <h3>Neymar Jr</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-2.png" alt="">
            <div class="player-info">
                <h3>Lionel Messi</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-3.png" alt="">
            <div class="player-info">
                <h3>Cristiano Ronaldo</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-4.png" alt="">
            <div class="player-info">
                <h3>Paulo Dybala</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-5.png" alt="">
            <div class="player-info">
                <h3>Mesut Ozil</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-6.png" alt="">
            <div class="player-info">
                <h3>Mauro Icardi</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-7.png" alt="">
            <div class="player-info">
                <h3>Di Maria</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-8.png" alt="">
            <div class="player-info">
                <h3>Kylian Mbappé</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-9.png" alt="">
            <div class="player-info">
                <h3>Mohamed Salah</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-10.png" alt="">
            <div class="player-info">
                <h3>Harry Kane</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-11.png" alt="">
            <div class="player-info">
                <h3>Kevin De Bruyne</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
        <article class="player">
            <img src="images/players/player-12.png" alt="">
            <div class="player-info">
                <h3>Philippe Coutinho</h3>
                <p>Football players are athletes who play football professionally. It should be noted that while
                    some parts of the world use the word “football” to describe soccer, actual football refers to
                    the American version of the sport. </p>
                <a class="link-button" href="">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
        </article>
    </section>
    <section class="flexible">
        <div class="fixture-header">
            <h3>Todays Matches</h3>
            <a class="link-button" target="_blank" href="https://www.goal.com/en-in/live-scores">Live</a>
        </div>
        <p>Live Football Scores, Fixtures & Results</p>
        <div class="fixture-name">
            <h3>UEFA CHAMPIONS LEAGUE</h3>
            <div class="fixtures">
                <div class="fixture">
                    <h4 id="orange-color" class="status">29'</h4>
                    <p>Kairat 1 - 0 Maccabi Haifa</p>
                </div>
                <hr>
                <div class="fixture">
                    <h4 class="status">21:00</h4>
                    <p>Kairat 1 - 0 Maccabi Haifa</p>
                </div>
                <hr>
                <div class="fixture">
                    <h4 class="status">23:00</h4>
                    <p>Kairat 1 - 0 Maccabi Haifa</p>
                </div>
                <hr>
                <div class="fixture">
                    <h4 class="status">00:00</h4>
                    <p>Kairat 1 - 0 Maccabi Haifa</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Football Website. All rights reserved.</p>
            <div class="flex justify-center mt-4">
                <a href="#" class="text-xl mr-4"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-xl mr-4"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-xl mr-4"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-xl mr-4"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        
    </footer>

    

</body>
<style>
   /* ------------------
   Adding Fonts 
--------------------*/
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

/* ---------------------------
common styles or utilities
-----------------------------*/
html,body{
    width: 100%;
    height: 100%;
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
}
body{
    font-family: 'Poppins', sans-serif;
    background: #FFFFFF;
}
main{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 158px;
}
h1{
    font-size: 64px;
    font-weight: bold;
}
h2{
    font-size: 48px;
    font-weight: bold;
}
h3{
    font-weight: bold;
    font-size: 28px
}
p{
    font-size: 16px;
    color: #6C6C6C;
    font-weight: normal;
}
.link-button{
    background: #E02C6D;
    padding: 10px 24px;
    text-decoration: none;
    color: white;
    margin-right: 0px;
}
.link-button:hover{
    background: #ff005d;
}
/* -----------------------
Top Header Styles Start
--------------------------*/
.top-header{
    background: #2D25A0; 
    height: 677px;
}
.top-header:hover{
    animation: slider 4s linear 0.3s infinite normal;
}
@keyframes slider {
    0%{
        background-color: #FFD55A;
    }
    50%{
        background-color: #293250;
    }
    100%{
       background-color: #6DD47E;
    }
}
/* Top Navigation Styles Start */
nav{
    padding-top: 42px;
    padding-bottom: 49px;
    display: flex;
    justify-content: space-around;
}
.menu-icon{
    display: none;
    color: white;
    font-size: 24px;
}
nav a{
    text-decoration: none;
    color: white;
    margin-right: 36px;
    font-weight: 500;
    font-size: 16px;
}
nav a:hover{
    text-decoration: underline;
}
/* Top Navigation Styles Ends */
.top-banner{
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.top-banner-text h1{
    width: 485px;
    color: white;
    margin-top: 0px;
    margin-bottom: 27px;
}


.top-banner-image img{
    width: 556.01px;
    height: 438px;
}
/*-----------------------
Top Header Styles End
-----------------------*/

/*-----------------------
Players Section Style Starts
------------------------------*/

.players{
    margin-top: 70px;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-column-gap: 30px;
    grid-row-gap: 27px;
    margin-bottom: 165px;
}
.player{
    display: flex;
    flex-direction: column;
    height: 100%; 
    box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
    align-items: flex-start;
}
.player:hover{
    color: white;
    background-color: #000000;
}
.player img{
    width: 300px;
    height: 256px;
    margin: 15px 15px 0px 15px;
}
.player-info{
    margin: 16px 15px;
}
.player-info h3{
    margin: 10px 0px;
}
.player-info p{
    width: 300px;
    margin: 25px 0px;
    text-align: justify;
}
.player-info .link-button{
    background-color: #990011FF;
}
.player-info .link-button:hover{
    background-color: rgb(197, 5, 28);
}

/*-----------------------
Players Section Style Ends
------------------------------*/

/*-----------------------
Football Updates Starts
------------------------------*/

.football-updates{
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 100px;
}
.updates-text{
    width: 469px;
    margin-right: 66px;
}
.updates-text h2{
    color: #0A0826;
    width: 469px;
    margin: 8px 0px;
}
.updates-text p{
    margin-top: 8px;
    margin-bottom: 24px;
}
.updates-text a{
    background: #E02C6D;
    width: 173px;
    padding: 10px 24px;
    text-decoration: none;
    color: white;
}
.updates-text a:hover{
    background: #ff005d;
}
.updates-image img{
    width: 567px;
    height: 427px;
}

/*-----------------------
Football Updates Ends
------------------------------*/

/*----------------------
Popular Highlights Style Starts
---------------------- */
.highlights{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-column-gap: 25px;
    margin-bottom: 100px;
}
.match{
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}
.match h4{
    width: 347.4px;
    margin-bottom: 5px;
}
/*----------------------
Popular Highlights Style Ends
---------------------- */

/*----------------------
Club Style Starts
---------------------- */
.clubs{
    display: grid;
    grid-template-columns: repeat(4,1fr);
    grid-column-gap: 30px;
    grid-row-gap: 20px;
    margin-bottom: 60px;
}
.club{
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    width: 240px;
    height: 150px;
    box-shadow: 10px 10px 40px gray;
    border-radius: 12px;
    /* transition: width 0.2s ease-in-out; */
}
.club:hover{
    /* width: 260px;
    height: 180px; */
    background-color: #E02C6D;
}
.club:hover .club-logo{
    width: 100px;
    height: 100px;
}
.club h4{
    margin: 0px;
    color: white;
    background-color: #2D25A0; 
    width: 100%;
    text-align: center;
}
.club-logo{
    width: 80px;
    height: 80px;
}

/*----------------------
Club Style Ends
---------------------- */


/* Fixture Style Starts */
.flexible{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.fixture-header{
    background-color: #2D25A0;
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 1050px;
    color: white;
}
.fixture-header .link-button{
    height: 100%;
}
.fixture-name{
    width: 787.5px;
    color: white;
    text-align: center;
}
.fixture-name h3{
    background-color: #2D25A0;
    margin: 0px;
}
.fixtures{
    display: grid;
    grid-template-columns: 1fr;
    box-shadow: 10px 10px 40px gray;
}
.fixture{
    display: flex;
    align-items: center;
}
.fixture h4{
    text-align: center;
}
.status{
    margin-left: 20px;
    width: 46px;
    background-color: rgb(91, 163, 91);
    padding: 8px;
}
.fixture p{
    color: black;
    margin-left: 220px;
}
hr{
    width: 100%;
}
#orange-color{
    background-color: orange;
}
 /* Fixture Style Ends */


/*----------------------
Footer Style Starts
---------------------- */
footer{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}
footer img{
    width: 483.87px;
}
footer a{
    color: black;
}
.fab{
    font-size: 32px;
    margin-right: 10px;
}
footer p{
    color: #000000;
    font-size: 18px;
    font-weight: normal;
    font-style: normal;
}

/*----------------------
Footer Style Ends
---------------------- */

/* Media Query For Phone Device */

@media only screen and (max-width: 688px){
    h1{
        font-size: 36px;
    }
    h2{
        font-size: 30px;
    }
    /* -----------------------
    Top Header Styles Start
    --------------------------*/
    .top-header{
        width: 100%;
        height: 695px;
    }
    nav{
        padding-top: 33px;
        padding-bottom: 0px;
        display: flex;
        justify-content: space-between;
        padding-left: 16px;
        padding-right: 21px;
    }
    .nav-links{
        display: none;
    }
    .menu-icon{
        margin: 3px;
        display: contents;
    }
    nav .link-button{
        padding: 7.47253px 17.9341px;
        margin-right: 0px;
    }
    .top-banner{
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    .top-banner-text h1{
        width: 278px;
        height: 138px;
        margin-bottom: 57px;
        margin-top: 46px;
    }
    .top-banner-text a{
        width: 168px;
        height: 100%;
        
    }
    .top-banner-image img{
        margin-top: 50px;
        width: 329px;
        height: 259.17px; 
    }
    /*-----------------------
    Top Header Styles End
    -----------------------*/

    /*-----------------------
    Players Section Style Starts
    ------------------------------*/
    .players{
        margin-top: 47px;
        display: grid;
        grid-template-columns: repeat(1,1fr);
        grid-row-gap: 24px;
        margin-bottom: 60px;
    }
    /*-----------------------
    Players Section Style Ends
    ------------------------------*/

    /*-----------------------
    Football Updates Starts
    ------------------------------*/
    .football-updates{
        flex-direction: column;
    }
    .updates-text{
        width: 329px;
        margin-right: 0px;
        margin-top: 0px;
    }
    .updates-text h2{
        width: 294px;
        margin-bottom: 27px;
    }
    .updates-text p{
        width: 329px;
    }
    .updates-image img{
        margin-top: 59px;
        width: 328px;
        height: 248px;
    }

    /*-----------------------
    Football Updates Ends
    ------------------------------*/
    /*----------------------
    Popular Highlights Style Starts
    ---------------------- */
    .highlights-header{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .highlights-header p{
        margin-top: 0px;
        width: 280px;
    }
    .highlights{
        grid-template-columns: 1fr;
    }
    .match{
        margin-bottom: 20px;
    }
    /*----------------------
    Popular Highlights Style Ends
    ---------------------- */

    /*----------------------
    Club Style Starts
    ---------------------- */
    .clubs-header{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .clubs-header p{
        width: 330px;
        margin-top: 0px;
    }
    .clubs{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }
    .club{
        margin-bottom: 20px;
    }
    /*----------------------
    Club Style Ends
    ---------------------- */

    /* Fixture Style Starts */
    .fixture-name{
        width: 97%;
    }
    .fixture-header{
        width: 100%;
        flex-direction: column;
    }
    .fixture-header .link-button{
        margin-bottom: 20px;
    }
    .fixture{
        justify-content: center;
    }
    .fixture p{
        margin-left: 40px;
    }
     /* Fixture Style Ends */


    /*----------------------
    Footer Style Starts
    ---------------------- */
    footer img{
        width: 275.8px;
    }
    footer p{
        text-align: center;
    }
    /*----------------------
    Footer Style Starts
    ---------------------- */
}

/* Media Query For Ipad/Tablets */

@media (min-width: 689px) and (max-width: 1024px){
    h1{
        font-size: 36px;
    }
    h2{
        font-size: 30px;
    }
    /* -----------------------
    Top Header Styles Start
    --------------------------*/
    .top-header{
        width: 100%;
        height: 500px;
    }
    .top-banner{
        display: flex;
        align-items: center;
        width: 100%;
    }
    .top-banner-text h1{
        width: 278px;
        height: 138px;
        margin-bottom: 57px;
        margin-top: 46px;
    }
    .top-banner-text a{
        width: 168px;
        height: 100%;
        
    }
    .top-banner-image img{
        margin-top: 50px;
        width: 329px;
        height: 259.17px; 
    }
    /*-----------------------
    Top Header Styles End
    -----------------------*/

    /*-----------------------
    Players Section Style Starts
    ------------------------------*/
    .players{
        margin-top: 47px;
        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-row-gap: 24px;
        margin-bottom: 60px;
    }
    /*-----------------------
    Players Section Style Ends
    ------------------------------*/

  



    /*----------------------
    Club Style Starts
    ---------------------- */
    .clubs-header{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .clubs-header p{
        width: 330px;
        margin-top: 0px;
    }
    .clubs{
        display: grid;
        grid-template-columns: repeat(2,1fr);
    }
    .club{
        margin-bottom: 20px;
    }
    /*----------------------
    Club Style Ends
    ---------------------- */


}
</style>

</html>
