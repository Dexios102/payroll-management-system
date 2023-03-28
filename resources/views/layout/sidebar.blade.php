<div class="container2">
      <div class="logo">
        
      </div>
      <ul class="link-items">
        <li class="link-item @yield('dashboard')">
          <a href="/dashboard" class="link">
            <ion-icon name="home-outline"></ion-icon>
            <span style="--i: 1">Home</span>
          </a>
        </li>
        <li class="link-item  @yield('payroll')">
          <a href="/payroll" class="link">
            <ion-icon name="cash-outline"></ion-icon>
            <span style="--i: 2">payroll</span>
          </a>
        </li>
        <li class="link-item  @yield('attendance')">
          <a href="/attendance" class="link"
            ><ion-icon name="person-add-outline"></ion-icon>
            <span style="--i: 3">attendance</span>
          </a>
        </li>
        <li class="link-item  @yield('employee')">
          <a href="/employee" class="link">
          <ion-icon name="people-circle"></ion-icon>
            <span style="--i: 4">employee</span>
          </a>
        </li>
        <li class="link-item @yield('department')">
          <a href="/department" class="link">
          <ion-icon name="trail-sign"></ion-icon>
          <span style="--i: 5">department</span>
          </a>
        </li>
        <li class="link-item @yield('position')">
          <a href="/position" class="link">
            <ion-icon name="man"></ion-icon>
            <span style="--i: 6">position</span>
          </a>
        </li>
        <li class="link-item @yield('allowance')">
          <a href="/allowance" class="link">
            <ion-icon name="cash"></ion-icon>
            <span style="--i: 7">allowance</span>
          </a>
        </li>
        <li class="link-item @yield('deduction')">
          <a href="/deduction" class="link">
            <ion-icon name="person-remove"></ion-icon>
            <span style="--i: 8">deduction</span>
          </a>
        </li>
        <li class="link-item">
          <a href="/logout" class="link">
            <ion-icon name="log-out"></ion-icon>
            <span style="--i: 9">logout</span>
          </a>
        </li>
        <li class="link-item dark-mode">
          <a href="#" class="link">
            <ion-icon name="moon-outline"></ion-icon>
            <span style="--i: 10">dark mode</span>
          </a>
        </li>
        <li class="link-item">
          <a href="#" class="link">
            <img src="images/logo.png" alt="" />
            <span style="--i: 11">
              <h4>HR</h4>
              <p>Admin</p>
            </span>
          </a>
        </li>
      </ul>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="js/sidebar.js"></script>