
window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2";

//  Basis-URL des Servers
window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;

//  Token für die Authentifizierung (zum Beispiel Token für Tom)
window.tokenTOM = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwMjI5NTIzfQ.15wcKi2kqllvpeAFIAYVa2UlSUxUUgOrt7FaZS9rrlM";
window.tokenJERRY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDAyMjk1MjN9.Jwr1I8pkjh3roG_3uUss3kgcGrays2eepnFzdawNuDA";



window.setInterval(function () {
    loadFriends();
}, 1000);

function loadFriends() {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);

            const acceptedFriends = data.filter(friend => friend.status === "accepted");
            const requestedFriends = data.filter(friend => friend.status === "requested");
            console.log(data);

            // Aktualisierung der Listen auf der Seite

            updateacceptedList(acceptedFriends, 'accepted-friends');
            updaterequestList(requestedFriends, 'new-requests');

            //location.reload();

        }
    };

    xmlhttp.open("GET", "ajax_load_friends.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/json');
    xmlhttp.send();
}



function updateacceptedList(friends, listId) {
    const list = document.getElementById(listId);

    list.innerHTML = '';
    //list.className='list-group';

    friends.forEach(friend => {
        const listItem = document.createElement('li');
        const a = document.createElement('a');
        const not = document.createElement('span');
        const listgroup = document.createElement('div');


        a.innerHTML = friend.username;
        a.setAttribute('href', 'chat.php?friend=' + friend.username);
        not.innerHTML = (friend.unread);
        list.appendChild(a);
        // list.appendChild(listItem);
        a.appendChild(not);
        a.className = 'list-group-item list-group-item-action';
        not.className = 'badge badge-primary badge-pill bg-primary pull-right';


    });
}

function updaterequestList(friends, listId) {
    const list = document.getElementById(listId);
    const listItem = document.createElement('p');
    list.innerHTML = '';

    if (friends.length == 0) {
        
        listItem.innerText = "none...";
       

    } else {
        friends.forEach(friend => {
           
            listItem.innerText = friend.username;
            listItem.className = 'form-control';

            listItem.setAttribute('data-bs-target', '#acceptModal');

            listItem.addEventListener("click", function () {
                openModal(friend.username)
            });


        });
    }
    list.appendChild(listItem);
}

function openModal(username) {
    console.log("hier modal " + document.getElementById('acceptModal'));
    const myModal = new bootstrap.Modal(document.getElementById('acceptModal'));

    myModal.show();
    document.getElementById('modal-title').textContent = "Friend request from " + username;
}




