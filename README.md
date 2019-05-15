<h1>Grupp 8 - Projekt API </h1>
<h3>Grupp 8: API - Projekt</>

Sidans funktionalitet: 
<ul>
	<li>Registrera användare</li>
	<li>Logga in</li>
	<li>Som inloggad kunna generera API-nyckel</li>
</ul>

Tabeller i databasen:
<ul>
	<li>Authors</li>
	<li>Books</li>
	<li>Category</li>
	<li>Publisher</li>
</ul>

Du behöver ha en API-nyckel för att kunna hämta.
Om du inte har en API-nyckel kan du hämta en via:
http://apiprojekt.mistert.se/APIcourse/Pages/index.php<br>

Då behöver du skapa ett konto.<br> 
För att kunna skapa ett konto måste man uppfylla kraven nedan.<br>
Användarnamn: Ska innehålla minst 4 tecken.<br>
Lösenord: Ska innehålla minst 4 tecken.<br>

Sedan behöver du logga in och generera en API-nyckel. Om du inte tycker om den, kan du generera en ny. 

Sen behöver du lägga in din API-nyckel i Postman. Det gör du i ‘Authorization’. Det behövs för alla requests.<br>
Key = apikey
Value = din genererade api-nyckel. 

<h3>GET:</h3><br>
Hämta en rad från en tabell:
?table=tabell&id=1<br>
tex: http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher&id=1<br><br>
Hämta alla rader från en tabell:
?table=tabell<br>
Ex: http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher<br><br>
<h3>POST:</h3><br>
Params
?table=tabell<br>
Ex: http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Books<br><br>
<h4>Body</h4>
Books tex:<br>
{
    "Namn": "Mr. T Third Edition",
    "Beskrivning": "Handlar om en kill som gillar bägare.",
    "Sidantal": 2553,
    "Pubid": 2,
    "Catid": 1
}<br>
<h4>Authors tex:<h4><br>
{
     “Förnamn” : “Eric”,
     “Efternamn” : “Sade”
}<br>
<h4>Category tex:</h4><br>
{
     “Namn” : “Sport”
}<br>
<h4>Publisher tex:</h4><br>
{
     “Namn” : “Något Förlag”
}<br>
<h3>PUT:</h3><br>
Params:
Samma som Post.<br>
<h4>Body<h4>
Samma som Post men lägg till id, till exempel:<br>
{
     "id" : 8,
    "Namn": "Felixs Bägare",
    "Beskrivning": "Bytte ju igen, o igen!",
    "Sidantal": 255,
    "Pubid": 1,
    "Catid": 3
}<br><br>
<h3>Delete:</h3>
Params:
Samma som post.<br>
<h4>Body<h4><br>
{
	"id" : 0
}
