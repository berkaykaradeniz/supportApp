var url = window.location.origin;

function setCookie(cname, cvalue) {
    const d = new Date();
    d.setTime(d.getTime() + (24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


//LOGIN
function checkLogin(){
    var email = $('#email').val();
    var password = $('#password').val();
    
    fetch(url + '/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(
            {
                'email': email,
                "password" : password
            })
    })
    .then(resp => resp.json().then(data => ({status: resp.status, body: data})))
    .then(json => 
    {
        if (json.status == 200)
        {
            console.log('Giris basarili');
            setCookie('Auth',json.body.token);
            setCookie('User_id',json.body.user_id);            
            $('#error').html('Correct. You will be redirected in 3 second');
            window.setTimeout(function() {
                window.location.href = url + '/panel';
            }, 3000);
        }
        else if(json.status == 404)
        {
            $('#error').html(json.body.message);
        }else{
            $('#error').html("Hata"); 
        }
    })
}
//REGISTER       
function register(){
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();


    fetch(url + '/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'aplication/json'
        },
        body: JSON.stringify(
            {
                "name" : name,
                'email': email,
                "password" : password
            })
    })
    .then(resp => resp.json().then(data => ({status: resp.status, body: data})))
    .then(json => 
    {
        if (json.status == 200 || json.status == 201)
        {
            $('#error').html('Correct. You will be redirected in 3 second');
            window.setTimeout(function() {
                window.location.href = url + '/login';
            }, 3000);
        }
        else if(json.status == 404 || json.status == 422)
        {
            $('#error').html(json.body.message);
        }else{
            $('#error').html("Hata"); 
        }
    })
}

  function checkAuth(){
    if (getCookie('Auth') == '')
        window.location.href = url;

  }

  //TICKETS

  function getTickets(){

    var user_id = getCookie('User_id');
    var token = getCookie('Auth');
    var data;
    
    fetch(url + '/api/tickets/getUserTickets', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept' : 'aplication/json',
            'Authorization': 'Bearer ' + token,
            mode: 'no-cors',

        },
        body: JSON.stringify(
            {
                "user_id" : user_id
            })
    })
    .then(resp => resp.json().then(data => ({status: resp.status, body: data})))
    .then(json => 
    {
        if (json.status == 200)
        {
            data = json.body;
            $('#tickets').DataTable({
                data: data,
                bLengthChange: false,
                columns: [
                  { data: 'id', title: 'ID' },
                  { data: 'department_id', title: 'Department ID' },
                  { data: 'user_id', title: 'User ID' },
                  { data: 'title', title: 'Title' },
                  { data: 'description', title: 'Description' },
                  { data: 'status', title: 'Status' },
                  { data: null, title: 'Process' }
                ],
                columnDefs: [
                    {
                            "render" : function(data,type,row){
                              return '<button type="button" class="btn btn-success btn-sm" onclick="editTicket(' + row.id+ ')">Edit Ticket</button>'
                        },
                        targets: -1,
                        data: null
                    },
                ],
              });
            //
        }
        else if(json.status == 404 || json.status == 401)
        {
            alert(json.body.message);
        }
    })
}

function editTicket(ticket_id){
    console.log(ticket_id);
}

function getRandomUserForNewTicket() {
    //Ticket will assing random department user
    var department_id = $('#department').val();
    var token = getCookie('Auth');
    var id = 0;
    fetch(url + '/api/tickets/getDepartmentUser', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token,
            mode: 'no-cors',

        },
        body: JSON.stringify(
            {
                "department_id" : department_id
            })
    })
    .then(resp => resp.json().then(data => ({status: resp.status, body: data})))
    .then(json => 
    {
        if (json.status == 200)
        {
            $('#user_id').val(json.body.id);
        }
        else if(json.status == 404 || json.status == 401)
        {
            alert(json.body.message);
        }
    });
}

function createNewTicket() {
    //Ticket will assing random department user
    var department_id = $('#department').val();
    var title = $('#title').val();
    var description = $('#description').val();

    var token = getCookie('Auth');
    var user_id = $('#user_id').val();

    fetch(url + '/api/tickets/createTicket', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token,
            mode: 'no-cors',

        },
        body: JSON.stringify(
            {
                "department_id" : department_id,
                "user_id" : user_id,
                "title" : title,
                "description" : description
            })
    })
    .then(resp => resp.json().then(data => ({status: resp.status, body: data})))
    .then(json => 
    {
        if (json.status == 200 || json.status == 201)
        {
            window.location.href = url + '/panel/tickets';
        }
        else if(json.status == 404 || json.status == 401)
        {
            alert(json.body.message);
        }
    });
}