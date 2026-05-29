//Hämtar det ny publicerade inlägget som skickas från 'create_post' formuläret
const form = document.forms['create_post'];
//Lägger till en funktion som lyssnar på när formuläret skickas från 'create_post'
//skapar en event objekt e
form.addEventListener('submit', (e) => {
    //Gör så att sidan inte laddas om när man lägger upp ett nytt inlägg
    e.preventDefault();

    //Variabler med information om inlägget
    let title = form['title'].value;
    let maintext = form['maintext'].value;

    //Skapar ett objekt som kan skicka förfrågningar utan att ladda om sidan
    const request = new XMLHttpRequest();
    //Förbereder att skicka datan
    //Använder 'post' metoden
    request.open('post', 'createpost_process.php');
    //en funktion som skapar nya inlägget när svaret kommer tillbaka från servern
    request.onload = function () {
        //Om vandlar json text till ett javascript objekt
        const respons = JSON.parse(request.responseText);

        //Om inlägget misslyckades skickas ett error meddelande
        if (respons.success === false) {
            document.getElementById('error_msg').innerText = respons.message;
        }
        //Annars töms hela formuläret.
        //Det nya inlägget skapas direkt här med hjälp av 'createElement()' så att det nya inlägget synns utan att sidan behöver laddas om
        //Sedan läggs det nya inlägget längst upp i listan av alla inlägg
        else {
            document.getElementById('error_msg').innerText = respons.message;
            form.reset();
            const posts_list = document.getElementById('posts_list');
            const newpost = document.createElement('div');
            newpost.className = 'onepost_box';
            newpost.innerHTML = `
            <div class="username_box">
            <p class="username_text">${respons.username}</p>
            </div>
            <div class="title_box">
            <p class="title_post">${respons.title}</p>
            </div>
            <div class="preview_box">
            <p class="preview_text">${respons.content.substring(0, 150)}...</p>
            </div>
            <div class="button_box">
            <a class="more_button" href="post.php?id=${respons.id}">
            <p class="button_text">
                Continue reading!
            </p>
            </a>
            </div>
            `;
            posts_list.prepend(newpost);
        }
    }
    //Skickar det nya inläggets data till servern genom AJAX
    request.send(new FormData(form));
})