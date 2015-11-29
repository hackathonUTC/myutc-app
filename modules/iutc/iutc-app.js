///<reference path="typings/tsd.d.ts"/>
var io = require("socket.io-client");
var angular = require("angular");
var app = angular.module("app", []);
app.controller("iutc", function ($scope) {
    $scope.messages = [{ author: "Antoine Wacheux", text: "Bonjour !", date: Date.now() }];
    $scope.salons = ["SI14", "LO21", "GE37", "SY01", "NF93", "MT23"];
    $scope.messageEdited = "";
    var connection = io.connect();
    $scope.keyPressed = function (event) {
        if (event.keyCode == 13) {
            connection.emit("chat-msg", $scope.messageEdited);
            $scope.messageEdited = "";
        }
    };
    connection.on("chat-msg", function (msg) {
        $scope.messages.push(msg);
        $scope.$apply();
    });
});
