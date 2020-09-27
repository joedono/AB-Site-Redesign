var express = require("express");

var site = express();
site.use(express.static("_build"));
site.listen(8080);
