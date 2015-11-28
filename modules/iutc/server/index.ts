/// <reference path="typings/tsd.d.ts" />

import express = require("express");
import morgan = require("morgan");
import socketio = require("socket.io");

let app = express();

app.use(morgan("combined"));

app.get("/", function(request, response){
    response.status(200).send("<h1>Hello world !</h1>");
});

let http = app.listen(3000, function(){
    console.log("Server listening on port 3000");
});

let io = socketio(http);

io.on("connection", function(socket){
    console.log("Nouvelle connexion");
    socket.on("disconnect", function(){
        console.log("One client disconnect");
    });
});
