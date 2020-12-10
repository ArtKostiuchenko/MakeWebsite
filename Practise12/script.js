const requestURL = 'https://jsonplaceholder.typicode.com/users';

function sendRequest(method, url, body = null) {
    return fetch(url).then(function(response) {
        return response.json();
    })
}

sendRequest('GET', requestURL).then(data => {
    var table = "<table cellspacing='0' cellpadding='5' border='1'><thead><tr><th>ID</th><th>Name</th><th>Username</th><th>Email</th><th>Phone</th><th>Website</th><th>City</th></thead><tr>";


    for (var i in data) {
        table += "<td>" + data[i].id + "</td>";
        table += "<td>" + data[i].name + "</td>";
        table += "<td>" + data[i].username + "</td>";
        table += "<td>" + data[i].email + "</td>";
		table += "<td>" + data[i].phone + "</td>";
		table += "<td>" + data[i].website + "</td>";
		table += "<td>" + data[i].address.city + "</td></tr>";
    }
    table += "</tbody>";
   
    document.writeln(table);
}).catch(error => console.error(error));