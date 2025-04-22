<div class="sidebar" id="side-bar">
    <div class="logo">
      <img src="{{ asset('uploads/obeid-logo.png') }}" alt="Logo">
      <div><strong>Obeid Specialized Hospital</strong></div>
      <div class="logo-text">Caring like family</div>
    </div>

    <div class="menu-section">
        <a href="doctors.html" class="text-decoration-none text-dark">
            <div class="menu-item d-flex justify-content-between align-items-center py-3 border-bottom">
              <span><i class="fas fa-user-md me-2"></i> Doctors</span>
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>
          
          <a href="locations.html" class="text-decoration-none text-dark">
            <div class="menu-item d-flex justify-content-between align-items-center py-3 border-bottom">
              <span><i class="fas fa-map-marker-alt me-2"></i> Our locations</span>
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>
          
          <a href="announcements.html" class="text-decoration-none text-dark">
            <div class="menu-item d-flex justify-content-between align-items-center py-3 border-bottom">
              <span><i class="fas fa-bullhorn me-2"></i> Announcements</span>
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>
          
          <a href="feedback.html" class="text-decoration-none text-dark">
            <div class="menu-item d-flex justify-content-between align-items-center py-3 border-bottom">
              <span><i class="fas fa-comment-dots me-2"></i> Your voice matters</span>
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>
          
          <a href="share.html" class="text-decoration-none text-dark">
            <div class="menu-item d-flex justify-content-between align-items-center py-3 border-bottom">
              <span><i class="fas fa-share-alt me-2"></i> Share with friend</span>
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>
          
          <a href="about.html" class="text-decoration-none text-dark">
            <div class="menu-item d-flex justify-content-between align-items-center py-3 border-bottom">
              <span><i class="fas fa-heart me-2"></i> About us</span>
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>          
    </div>

    <div class="bottom-section items-center text-center">
      <div class="buttons">
        <!-- <button><i class="fas fa-language"></i> العربية</button> -->
        @if(Auth::guest())
            <a href="{{ route('login') }}" class="btn login-btn">
                <i class="fas fa-power-off"></i> Login
            </a>
        @else
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn login-btn">
                    <i class="fas fa-power-off"></i> Logout
                </button>
            </form>
        @endif
      </div>

      <div class="social-icons">
        <i class="fab fa-twitter"></i>
        <i class="fab fa-youtube"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook"></i>
      </div>

      <div class="footer-links">
        Terms of service | Privacy policy
      </div>
    </div>
  </div>
