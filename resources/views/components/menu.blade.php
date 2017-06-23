<aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="/dashboard"><span class="icon"><i class="fa fa-dashboard"></i></span>&nbsp; Dashboard</a></li>
    <li><a>Tournament Planner</a></li>
  </ul>
@can('superAdmin', App\Admin::class)
  <p class="menu-label">
    Super Admin
  </p>
  <ul class="menu-list">
    <li><a href="/users"><span class="icon"><i class="fa fa-user-times"></i></span>&nbsp; User List</a></li>
  </ul>
@endcan
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a href="/clubs"><span class="icon"><i class="fa fa-institution"></i></span>&nbsp; Clubs</a></li>
    <li><a href="/teams"><span class="icon"><i class="fa fa-users"></i></span>&nbsp; Teams</a></li>
    <li><a>Players</a></li>
  </ul>
  <p class="menu-label">
    Knowledge Center
  </p>
  <ul class="menu-list">
    <li><a href="/faqs"><span class="icon"><i class="fa fa-question"></i></span>&nbsp; FAQs</a></li>
    <li><a href="/terminology"><span class="icon"><i class="fa fa-bullhorn"></i></span>&nbsp; Terminology</a></li>
    <li><a href="/erd"><span class="icon"><i class="fa fa-database"></i></span>&nbsp; Database Design</a></li>
    <li><a href="/journey"><span class="icon"><i class="fa fa-hourglass-half"></i></span>&nbsp; Journey</a></li>
  </ul>
</aside>
