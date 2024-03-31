<x-app title="teams">
    <div class="container">
        <h2 class="text-2xl uppercase font-bold mb-5">Liste des équipes</h2>
        <section id="clubs">
           
            <div class="clubs">
                @foreach($teams as $team)
                <div class="club">
                    <img class="club-logo" src="{{ asset('storage/' . $team->flag) }}" alt="{{ $team->name }}">
                    <h4>{{ $team->name }}</h4>
                </div>
                @endforeach
            </div>
        </section>
        
    </div>

    
</x-app>
<style>
    
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

</style>

