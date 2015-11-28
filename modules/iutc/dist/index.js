/// <reference path="typings/tsd.d.ts" />
var express = require("express");
var morgan = require("morgan");
var socketio = require("socket.io");
var app = express();
app.use(morgan("combined"));
app.get("/", function (request, response) {
    response.status(200).send("<h1>Hello world !</h1>");
});
var http = app.listen(3000, function () {
    console.log("Server listening on port 3000");
});
var io = socketio(http);
io.on("connection", function (socket) {
    console.log("Nouvelle connexion");
    socket.on("disconnect", function () {
        console.log("One client disconnect");
    });
});
