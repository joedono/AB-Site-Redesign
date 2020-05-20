var express = require("express");

var site = express();
site.use(express.static("build"));
site.listen(8080);