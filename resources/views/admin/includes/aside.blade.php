  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar">
      <div class="sidebar-header">
          <a href="#" class="sidebar-brand">
              <span class="self-center text-xl whitespace-nowrap">
                  <span class="font-bold italic" style="color: white;">Muscle</span>
                  <span class="font-semibold italic" style="color: gold;">Minds</span>
              </span>
          </a>
          <div class="sidebar-toggler not-active">
              <span></span>
              <span></span>
              <span></span>
          </div>
      </div>
      <div class="sidebar-body">
          <ul class="nav">
              <li class="nav-item nav-category">Main</li>
              <li class="nav-item">
                  <a href="dashboard.html" class="nav-link">
                      <i class="link-icon" data-feather="box"></i>
                      <span class="link-title">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item nav-category">web apps</li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                      aria-controls="emails">
                      <i class="link-icon" data-feather="mail"></i>
                      <span class="link-title">manage users</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                  <div class="collapse" id="emails">
                      <ul class="nav sub-menu">
                          <li class="nav-item">
                              <a href="{{ route('users.index') }}" class="nav-link">All Users </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">manage categorys</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">All categorys</a>
                        </li>
                    </ul>
                </div>
            </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                      aria-controls="emails">
                      <i class="link-icon" data-feather="mail"></i>
                      <span class="link-title">manage Products</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                  <div class="collapse" id="emails">
                      <ul class="nav sub-menu">
                          <li class="nav-item">
                              <a href="{{ route('products.index') }}" class="nav-link">All Products</a>
                          </li>
                      </ul>
                  </div>
              </li>
              
              <li class="nav-item">
                  <a href="pages/apps/chat.html" class="nav-link">
                      <i class="link-icon" data-feather="message-square"></i>
                      <span class="link-title">Chat</span>
                  </a>
              </li>

          </ul>
      </div>
  </nav>
  <nav class="settings-sidebar">
      <div class="sidebar-body">
          <a href="#" class="settings-sidebar-toggler">
              <i data-feather="settings"></i>
          </a>
          <div class="theme-wrapper">
              <h6 class="text-muted mb-2">Light Theme:</h6>
              <a class="theme-item" href="../demo1/dashboard.html">
                  <img src="../assets/images/screenshots/light.jpg" alt="light theme">
              </a>
              <h6 class="text-muted mb-2">Dark Theme:</h6>
              <a class="theme-item active" href="../demo2/dashboard.html">
                  <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
              </a>
          </div>
      </div>
  </nav>
