<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="image_src" type="image/jpeg" href="img/logo.png" />
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="English DZ is a social network for Algerian English speakers" />
    <meta name="keywords" content="english, dz, algeria, learn, social" />
    <link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'http://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-44039803-2', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<body id="body" class="index">
    <div class="ui fixed inverted main menu">
        <div class="ui container">
            <a class="launch icon item" href="{{ url('/') }}">
        <i class="home icon"></i>
      </a>
            <div class="right menu">
                <div class="vertically fitted borderless item">
                    <iframe class="github" src="http://ghbtns.com/github-btn.html?user=caddydz&amp;repo=english&amp;type=watch&amp;count=true" allowtransparency="true" frameborder="0" scrolling="0" width="100" height="20"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="pusher">
        <div class="full height">
            <div class="following bar">
                <div class="ui container">
                    <div class="ui large secondary network menu">
                        <div class="item">
                            <div class="ui logo shape">
                                <div class="sides">
                                    <div class="active ui side">
                                        <img class="ui image" src="img/logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="view-ui item" href="{{ url('/') }}">
              <i class="home icon"></i> Home
            </a>
                        <div class="right menu">
                            <div class="item">
                                <a class="twitter-share-button twitter" href="http://twitter.com/share" data-text="Algerian English speakers social network is here!!" data-url="https://englishdz.herokuapp.com" data-via="saly3301">
                </a>
                                <script type="text/javascript">
                                    window.twttr = (function(d, s, id) {
                                        var t, js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) {
                                            return
                                        }
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "https://platform.twitter.com/widgets.js";
                                        fjs.parentNode.insertBefore(js, fjs);
                                        return window.twttr || (t = {
                                            _e: [],
                                            ready: function(f) {
                                                t._e.push(f)
                                            }
                                        })
                                    }(document, "script", "twitter-wjs"));
                                </script>
                                <iframe class="github" src="http://ghbtns.com/github-btn.html?user=caddydz&amp;repo=english&amp;type=watch&amp;count=true" allowtransparency="true" frameborder="0" scrolling="0" width="100" height="20"></iframe>
                            </div>
                            <a class="view-ui item" href="{{ url('/login') }}">
                <i class="sign in icon"></i> Login
              </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zoomed masthead segment" id="app-wrapper">
                <div class="ui container">
                    <div class="introduction">
                        <a class="ui black version label" href="https://github.com/CaddyDz/English/releases/tag/0.1.1">
              0.1.1 Beta
            </a>
                        <h1 class="ui inverted header">
              <span class="library">
                {{ config('app.name') }}
              </span>
              <span class="tagline">
                Social network for Algerian English speakers
              </span>
            </h1>
                        <div class="ui hidden divider"></div>
                        <button v-scroll-to="{ el: '#register', offset: -100 }" class="ui huge inverted download button">
              Sign Up
            </button>
                    </div>
                </div>
                <div class="ui hidden divider"></div>
                <div id="register">
                    @include('auth.register')
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    <script src="/js/vue.js" charset="utf-8"></script>
    <script src="/js/vue-scrollto.js"></script>
    <script src="/js/jquery.min.js" charset="utf-8"></script>
    <script src="/js/semantic.min.js"></script>
    <script src="js/home.js"></script>
</body>

</html>
