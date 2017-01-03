// load .env
require('dotenv').config();

// start server
var debug = require('debug')('ye-olde'),
	http = require("http"),
	connect = require('connect'),
	serveStatic = require('serve-static'),
	bodyParser = require('body-parser'),
	name = 'YeOldeLocalhost';

debug('booting %s', name);

var SERVER_PORT = process.env.SERVER_PORT;

// Set up Connect routing
var app = connect()
	.use(bodyParser.urlencoded())
    .use('/devflow/settings', function(req, res, next){
		handle_json_request(req, res, next, devflow_settings);
    })
    .use(serveStatic(__dirname + '/public'))
    .use(function(req, res) {
        console.log('Could not find handler for: ' + req.url);
        res.end('Could not find handler for: ' + req.url);
    })
    .use(function(err, req, res, next) {
        console.log('Error trapped by Connect: ' + err.message + ' : ' + err.stack);
        res.end('Error trapped by Connect: ' + err.message);
    });

// Start node server listening on specified port -----
http.createServer(app).listen(SERVER_PORT);
debug('HTTP server listening on port %s', SERVER_PORT);

// simpler way to handle json response
function handle_json_request(req, res, next, callback){
  callback(req, function(err, data){
	if (err) {
  		res.end(JSON.stringify(err));
	} else {
  		res.end(JSON.stringify(data));
	}
  });
}

// settings are saved in a file named .devflow
function devflow_settings(req, next){
	var fs = require('fs'),
		path = require('path');
	var settingsFilePath = path.join(__dirname, '.devflow');
	// save settings if passed in
	console.log('settings?',settingsData);
	console.dir(req.body);
	if (typeof req.body.settings !== 'undefined' && req.body.settings){
		console.log('write the file!');
		var settingsData = JSON.parse(req.body.settings);	// parse and then stringify it to sanitize it
		fs.writeFile(settingsFilePath, JSON.stringify(settingsData), function(err) {
		    if(err) {
		        return next(err);
		    }
		});
	} else {
		console.log('no settings passed in');
	}
	// return all settings
	fs.readFile(settingsFilePath, {encoding: 'utf-8'}, function(err,data){
	    if (err){
	    	if(err.code == 'ENOENT') {
	    		debug('no devflow settings file - creating it');
	    		var settingsData = {};
				fs.writeFile(settingsFilePath, JSON.stringify(settingsData), function(err) {
				    if(err) {
				        return next(err);
				    }
				    return next(null,settingsData);
				});	    		
	    	} else {
	    		// some other error
		    	return next(err);
	    	}
	    } else{
		    return next(null,JSON.parse(data));
	    }
	});
	/*
	needed?
	web server type = apache or nginx
	web server restart command	
	root database creds
	*/

}




