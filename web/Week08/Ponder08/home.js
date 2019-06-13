let http = require ('http');
let url = require('url');

http.createServer(onRequest).listen(8888);

function onRequest(req, res)
{
    let body = "";

    if (url.parse(req.url, true).pathname == "/home") {
        body = '<h1>Welcome to the Home Page</h1>';
        res.writeHead(200, {'Content-type' : 'text/html'}).end(body);
    } else if (url.parse(req.url, true).pathname == "/getData") {
        res.writeHead(200, {'Content-type' : 'text/html'});
        res.write(JSON.stringify({"name" : "Christian Jensen", "class" : "CS 313"}));
        res.end();
    } else {
        body = '<h1>Page Not Found</h1>';
        res.writeHead(404, {'Content-type' : 'text/html'}).end(body);
    }
}