<div class="header">
    <div class="custom-wrapper pure-g pure-menu pure-menu-fixed" id="menu">
      <div class="pure-u-1 pure-u-md-1-5">
        <div class="pure-menu">
          <a class="pure-menu-heading" href="/"><img src="/img/logos/splash-sm-300.png" class="pure-img-reponsive" style="max-width:150px; z-index:100;" /></a>
          <a href="#" class="custom-toggle" id="toggle"><s class="bar"></s><s class="bar"></s></a>
        </div>
      </div>
      <div class="pure-u-1 pure-u-md-4-5">
        <div class="pure-menu custom-menu-3 pure-menu-horizontal">
          <ul class="pure-menu-list">
              <li class="pure-menu-item pure-menu-selected"><a href="/" class="pure-menu-link">Home</a></li>
              <li class="pure-menu-item"><a href="/front/classes" class="pure-menu-link">Classes</a></li>
              <li class="pure-menu-item"><a href="/pages/awards" class="pure-menu-link">Awards</a></li>
              <li class="pure-menu-item"><a href="/front/venues" class="pure-menu-link">Venues</a></li>
              <li class="pure-menu-item"><a href="/front/faqs" class="pure-menu-link">FAQs</a></li>
              <li class="pure-menu-item"><a href="/user/users/login" class="pure-menu-link">Log In</a></li>
          </ul>
        </div>
        <div class="pure-menu custom-menu-vert custom-can-transform pure-menu-horizontal">
          <div class="pure-u-1-2" style="float:left; background-color: #273544;">
            <ul class="pure-menu-list">
                <li class="pure-menu-item pure-menu-selected"><a href="/" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="/front/classes" class="pure-menu-link">Classes</a></li>
                <li class="pure-menu-item"><a href="/pages/awards" class="pure-menu-link">Awards</a></li>
            </ul>
          </div>
          <div class="pure-u-1-2" style="float:left; background-color: #273544;">
            <ul class="pure-menu-list">
              <li class="pure-menu-item"><a href="/front/venues" class="pure-menu-link">Venues</a></li>
              <li class="pure-menu-item"><a href="/front/faqs" class="pure-menu-link">FAQs</a></li>
              <li class="pure-menu-item"><a href="/user/users/login" class="pure-menu-link">Log In</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
      (function (window, document) {
      var menu = document.getElementById('menu'),
          WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

      function toggleHorizontal() {
          [].forEach.call(
              document.getElementById('menu').querySelectorAll('.custom-can-transform'),
              function(el){
                  el.classList.toggle('pure-menu-horizontal');
              }
          );
      };

      function toggleDisplay() {
          [].forEach.call(
              document.getElementById('menu').querySelectorAll('.custom-can-transform'),
              function(el){
                  el.classList.toggle('displaytoggle');
              }
          );
      };

      function toggleMenu() {
          // set timeout so that the panel has a chance to roll up
          // before the menu switches states
          if (menu.classList.contains('open')) {
              toggleDisplay();
              setTimeout(toggleHorizontal, 500);
          }
          else {
              toggleDisplay();
              toggleHorizontal();
          }
          menu.classList.toggle('open');
          document.getElementById('toggle').classList.toggle('x');
      };

      function closeMenu() {
          if (menu.classList.contains('open')) {
              toggleMenu();
          }
      }

      document.getElementById('toggle').addEventListener('click', function (e) {
          toggleMenu();
          e.preventDefault();
      });

      window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
      })(this, this.document);

      </script>
