<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Ye Olde Localhost</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">jed localhost</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Ok</h1>
        <p>
          <span id="current-date-time">date / time</span><br />
          <span id="current-weather">weather</span>
        </p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Whats this for? &raquo;</a></p>
      </div>
    </div>

    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a id="tab-home" href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
          <li role="presentation"><a id="tab-work" href="#work" aria-controls="profile" role="tab" data-toggle="tab">Work</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
            <p>
            events coming up this week?
            </p>
            <hr />
            <h3>My todos at home</h3>
            <ol>
              <li>do laundry</li>
              <li>have a poker game</li>
              <li>send grandma a birthday card</li>
              <li>do moulding in hallway</li>
              <li>plan how to make the kitchen better</li>
              <li>workout!</li>
              <li>blow the leaves</li>
              <li>buy workout stuff (done)</li>
              <li>buy xmas presents for jena</li>
              <li>improve! our bedroom</li>
            </ol>
          </div>
          <div role="tabpanel" class="tab-pane" id="work">
            <ol>
              <li><a href="liquid-trello/public/">liquid trello</a></li>
              <li><a href="info.php">phpinfo</a></li>
              <li><a href="http://local.phpmyadmin.com/">php my admin</a></li>
              <li><a href="http://ci.sharpdotinc.com/">Jenkins</a></li>
              <li><a href="/bergdorf-directory">bergdorf-directory</a></li>
              <li><a href="/skovr-nfc">skovr-nfc</a></li>
            </ol>

            <p>
            date / time / weather
            status!<br>
            current sprints (burndowns)<br>
            future sprints (nearest date of unplanned sprint)<br>
            support tickets: # critical?<br>
            new biz pending: items past due or due soon<br>
            timesheets status: any not done?
            </p>
            <hr />
            <h3>My todos</h3>
            <ol>
              <li></li>
              <li>somethign else</li>
            </ol>

            <h3>Dev tips</h3>
            <p>How to restart apache on a mac?</p>
            <code>sudo apachectl restart</code>
            <p>How to restart mysql on a mac?</p>
            <code>sudo /usr/local/mysql/support-files/mysql.server restart</code>
            <p>How to make a directory writable by Apache in Mac OS X</p>
            <code>chown -R _www:staff cache</code>
            <p>Code to show all php errors</p>
            <code>ini_set('display_errors',1); ini_set('display_startup_errors',1); error_reporting(-1);</code>

            <p>Command to checkout a branch from github and track it</p>
            <code>git checkout -t origin/BRANCHNAME</code>

            <p>Grep - show 33 extra lines around a match of 'foo'</p>
            <code>grep -C 33 foo README.txt</code>


    <h3>Helpful Ubuntu commands</h3>

<p>find files by name in linux command line</p>
<code>find -name 'foobar'</code>
<hr>

<p>copy and paste 5 lines in vim</p>
<code>y5y<br>
p</code>
<hr>

<p>delete 7 lines in vim (the lines are those under the cursor)</p>
<code>d7d</code>
<hr>

<p>push new git local branch to remote</p>
<code>git push -u origin feature_branch_name</code>
<hr>

<p>various drush goodies...</p>
<code>drush pm-enable module_name -y</code><br>
<code>drush pm-update</code><br>
<code>drush pm-update module_name_1 module_name_2</code><br>
<code>drush pm-updatedb</code><br>
<code>drush cc</code><br>
<code>drush pm-list | grep module_name</code><br>
<code>drush watchdog-show</code>

<hr>
<p>svn checkout command line</p>
<code>svn checkout --username=jdost --password=x http://svn.sharpdotinc.com/repo/ here</code>
<hr>
<p>show php errors from inside php</p>
<code>error_reporting(E_ALL); ini_set('display_errors', 1);</code>
<hr>

<p>checkout and track git branch</p>
<code>git checkout -t origin/BRANCHNAME</code>
<hr>

<p>svn add all new files in a folder</p>
<code>svn add --force .</code>
<hr>

<p>svn remove all deleted files in a folder</p>
<code>svn st | grep '^!' | awk '{print $2}' | xargs svn delete --force</code>
<hr>

<p>flush memcached cache</p>
<code>echo 'flush_all' | nc localhost 11211</code>
<hr>

<p>scp file from remote to local</p>
<code>scp REMOTE:/path/to/file .</code>
<hr>




          </div>
        </div>          
    </div> <!-- .container -->

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Fullmatches</h2>
          <div id="fullmatches">fullmatches feed data here please</div>
          <p><a class="btn btn-primary" href="/fm" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Pay now form</h2>
          <p>Copy this for invoices</p>
          <form name="PrePage" method="post" action="https://Simplecheckout.authorize.net/payment/CatalogPayment.aspx">
          <input type="hidden" name="LinkId" value="c8b9e7d3-b605-4195-8e17-f976085f3927">
          <input type="submit" value="Pay Invoice Here">
          </form>          
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="lib/moment.js"></script>
    <script src="lib/js.cookie.js"></script>

    <script>
    $(function() {
      // enable tabs and use a cookie to remember which one was last open
      $('.nav-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        Cookies.set('active-tab', $(this).prop('id'));
      });
      if (Cookies.get('active-tab')){
        var tabId = Cookies.get('active-tab');
        $('#'+tabId).tab('show');
      }

      // populate fullmatches feed
      function parseRSS(url, callback) {
        $.ajax({
          url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(url),
          dataType: 'json',
          success: function(data) {
            callback(data.responseData.feed);
          }
        });
      }

      parseRSS('http://www.fullmatchesandshows.com/feed/', function(feed){
        //console.log('got the feed!', feed);
        function cleanTitle(title){
          return title.replace('The post', '').replace('appeared first on Full Matches and Shows.','');
        }
        var $wrap = $('#fullmatches'),
          items = '';
          $(feed.entries).each(function(index, entry){
            if (entry.content.indexOf('Highlights') > -1){
              //http://localhost/fullmatches/?url=http%3A%2F%2Fwww.fullmatchesandshows.com%2F2016%2F11%2F20%2Fac-milan-vs-inter-highlights-full-match-3%2F#
            items += '<div class="item"><a href="/fm/?url='+encodeURIComponent(entry.link)+'">' + cleanTitle(entry.contentSnippet) + '</a></div>';
          }
          });
        $wrap.html(items);
      });
      //
      function setDateTime(){
        $('#current-date-time').text(moment().format('MMM Do, h:mm'));
      }
      setDateTime();
      setInterval(setDateTime, 30*1000);
      //
      var zip = 30316,
        city = 'Atlanta',
        days = 5;
      $.ajax({
          //url: "http://api.openweathermap.org/data/2.5/weather?units=imperial&q="+city+",us&appid=9a54a5ff917e7a54fc257ae34f1007cd",
          url: "http://api.openweathermap.org/data/2.5/forecast/daily?cnt="+days+"&units=imperial&q="+city+",us&appid=9a54a5ff917e7a54fc257ae34f1007cd",
          dataType: 'jsonp',
          success: function(result){
            console.log(result);
            var weather = '';
              $(result.list).each(function(index,day){
                var theday = (index == 0) ? 'Today' : moment.unix(day.dt).format('dddd');
                weather += '<div class="weather-day">' + theday + ': ' + day.weather[0].main + ' <small>(' + day.temp.min + ' / ' + day.temp.max + ')</small></div>';

              });
//            var message = ("Currently in "+ city + ': <strong>' + result.weather[0].main + ' ' + Math.round(result.main.temp) + '</strong>');
            $('#current-weather').html(weather);
          }
      });



    // end
    });

    </script>


  </body>
</html>

