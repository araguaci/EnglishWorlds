<div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
      <div class="ui stackable inverted divided grid">
        <div class="three wide column">
          <h4 class="ui inverted header">Group 1</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Link One</a>
            <a href="#" class="item">Link Two</a>
            <a href="#" class="item">Link Three</a>
            <a href="#" class="item">Link Four</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Group 2</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Link 1</a>
            <a href="#" class="item">Link 2</a>
            <a href="#" class="item">Link 3</a>
            <a href="#" class="item">Link 4</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Group 3</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Link One</a>
            <a href="#" class="item">Link Two</a>
            <a href="#" class="item">Link Three</a>
            <a href="#" class="item">Link Four</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header"><i class="copyright icon"></i>{{ date("Y") }} {{ config('app.name') }}</h4>
          <p>Please consider contributing to the project on <i class="github icon"></i><a href="https://github.com/CaddyDz/English/">GitHub</a></p>
        </div>
      </div>
      <div class="ui inverted section divider"></div>
      <img src="{{ secure_asset('img/brand_35x35.png')}}" class="ui centered mini image">
      <div class="ui horizontal inverted small divided link list">
        <a class="item" href="#">Site Map</a>
        <a class="item" href="#">Contact Us</a>
        <a class="item" href="#">Terms and Conditions</a>
        <a class="item" href="#">Privacy Policy</a>
      </div>
    </div>
  </div>
  @section('styles')
    <link href="{{ secure_asset('css/welcome.css') }}" rel="stylesheet">
  	<link href="{{ secure_asset('css/footer.css') }}" rel="stylesheet">
  @endsection
