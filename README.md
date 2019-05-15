<h1>Grupp 8 - Projekt API </h1>

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
Om du inte har en API-nyckel kan du hämta en via:<br>
<a href="http://apiprojekt.mistert.se/APIcourse/Pages/index.php">
	http://apiprojekt.mistert.se/APIcourse/Pages/index.php</a>
<br><br>

Då behöver du skapa ett konto. För att kunna skapa ett konto måste man uppfylla kraven nedan.<br>
<ul>
	<li>Användarnamn: Ska innehålla minst 4 tecken.</li>
	<li>Lösenord: Ska innehålla minst 4 tecken.</li>
</ul>


Sedan behöver du logga in och generera en API-nyckel. Skulle det behövas kan du skapa en ny på samma sida.<br>
<a href="http://apiprojekt.mistert.se/APIcourse/Pages/create_api_key.php">
	http://apiprojekt.mistert.se/APIcourse/Pages/create_api_key.php</a><br>

Sen behöver du lägga in din API-nyckel i Postman. Det gör du i <br>
‘Authorization’. Det behövs för alla requests.<br>
Key = apikey
Value = din genererade api-nyckel.

<br><br>

<h3><u>GET:</u></h3>
<br>

Hämta en rad från en tabell:
?table=tabell&id=1<br>
tex: <a href="http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher&id=1">
	http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher&id=1</a><br><br>
Hämta alla rader från en tabell:
?table=tabell<br>
Ex: <a href="http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher">
	http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher</a><br><br>


<h3><u>POST:</u></h3>
<br>

Params
?table=tabell<br>
Ex: <a href="http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Books">
http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Books</a><br>
<h4>Body</h4>

<p>Books tex:
{
		"Namn": "Mr. T Third Edition",
		"Beskrivning": "Handlar om en kill som gillar bägare.",
		"Sidantal": 2553,
		"Pubid": 2,
		"Catid": 1
}</p>

<p>Authors tex:
{
		 “Förnamn” : “Eric”,
		 “Efternamn” : “Sade”
}</p>

<p>Category tex:
{
		 “Namn” : “Sport”
}</p>
<p>Publisher tex:
{
		 “Namn” : “Något Förlag”
}</p>

<br>

<h3><u>PUT:</u></h3>
<br>

Params:
Samma som Post.<br>
<h4>Body</h4>

<p>Samma som POST men med extra argumentet 'id' i början, till exempel:<br>
	Books:
{
		 "id" : 8,
		"Namn": "Felixs Bägare",
		"Beskrivning": "Bytte ju igen, o igen!",
		"Sidantal": 255,
		"Pubid": 1,
		"Catid": 3
}</p>

<br><br>

<h3><u>DELETE:</u></h3><br>
Params:
Samma som POST, men med enbart argumentet 'id'.<br>
<h4>Body</h4>
<p>Books:
	{
		"id" : 0
	} </p>
