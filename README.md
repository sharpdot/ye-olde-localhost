# Ye Olde Localhost

## installation
Install node and npm and then
```
npm install
```
in the root directory here and then copy the default.env file to .env and finally
```
node server.js
```

Open http://localhost:8000/

and that's it

### caveat
this isn't running with nodemon and other stuff

### windows
note to self - this is what i used to install on windows: http://blog.teamtreehouse.com/install-node-js-npm-windows

### on mac - to run on startup
```
sudo cp com.yeoldelocalhost.application.plist /Library/LaunchDaemons/
sudo launchctl load /Library/LaunchDaemons/com.yeoldelocalhost.application.plist
sudo launchctl start com.yeoldelocalhost.application
```
then you can start / stop the process with
```
sudo launchctl stop com.yeoldelocalhost.application
sudo launchctl start com.yeoldelocalhost.application
```

