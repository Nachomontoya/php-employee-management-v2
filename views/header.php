<header class="p-3 mb-3 border-bottom bg-blue text-white">
  <div class="d-flex flex-wrap align-items-center justify-content-between">
    <a href="<?= BASE_URL ?>" class="
        d-flex
        align-items-center
        mb-2 mb-lg-0
        text-white text-decoration-none
        d-none d-md-block
      ">
      <img src="<?= BASE_URL ?>assets/images/assembler_logo_wht.png" alt="Assembler Logo" width="140" height="40" />
    </a>

    <ul class="nav col-lg-auto mb-2 justify-content-center mb-md-0">
      <li>
        <a href="<?= BASE_URL ?>" class="nav-link" id="navDashboard">
          <svg class="bi d-block mx-auto mb-1" width="24" height="24">
            <use xlink:href="<?= BASE_URL ?>node_modules/bootstrap-icons/bootstrap-icons.svg#speedometer2"></use>
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="<?= BASE_URL ?>employees/employeeForm" class="nav-link" id="navEmployee">
          <svg class="bi d-block mx-auto mb-1" width="24" height="24">
            <use xlink:href="<?= BASE_URL ?>node_modules/bootstrap-icons/bootstrap-icons.svg#person-fill"></use>
          </svg>
          Employee
        </a>
      </li>
      <?php if (isset($this->isAdmin) && $this->isAdmin) : ?>
        <li>
          <a href="<?= BASE_URL ?>users" class="nav-link" id="navUsers">
            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
              <use xlink:href="<?= BASE_URL ?>node_modules/bootstrap-icons/bootstrap-icons.svg#gear-wide"></use>
            </svg>
            Users
          </a>
        </li>
      <?php endif; ?>
    </ul>

    <div class="dropdown text-end">
      <a href="#" class="
          d-block
          link-dark
          text-decoration-none
          dropdown-toggle
          text-white
        " id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle" />
      </a>
      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser">
        <?php if (isset($this->isAdmin) && $this->isAdmin) : ?>
          <li>
            <a class="dropdown-item text-danger" href="<?= BASE_URL . 'users' ?>">Manage users</a>
          </li>
        <?php endif; ?>
        <li>
          <a class="dropdown-item text-danger" href="<?= BASE_URL . 'login/signOut' ?>">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
  <script>
    let url = window.location.href;
    let parts = url.split('/');

    // Reset all nav-links
    $('.nav-link').each(function() {
      if ($(this).hasClass('text-white')) {
        $(this).removeClass('text-white');
      }
      if (!$(this).hasClass('text-secondary-blue')) {
        $(this).addClass('text-secondary-blue')
      }
    });

    if (parts[5] === "employeeForm") {
      $('#navEmployee').addClass('text-white').removeClass('text-secondary-blue');
    } else if (parts[4] === "users") {
      $('#navUsers').removeClass('text-secondary-blue').addClass('text-white');
    } else {
      $('#navDashboard').addClass('text-white').removeClass('text-secondary-blue');
    }
  </script>
</header>