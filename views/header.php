<header class="p-3 mb-3 border-bottom bg-dark text-white">
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
        <a href="<?= BASE_URL ?>" class="nav-link text-white" id="navDashboard">
          <svg class="bi d-block mx-auto mb-1" width="24" height="24">
            <use xlink:href="<?= BASE_URL ?>node_modules/bootstrap-icons/bootstrap-icons.svg#speedometer2"></use>
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="<?= BASE_URL ?>employees/employeeForm" class="nav-link text-secondary" id="navEmployee">
          <svg class="bi d-block mx-auto mb-1" width="24" height="24">
            <use xlink:href="<?= BASE_URL ?>node_modules/bootstrap-icons/bootstrap-icons.svg#person-fill"></use>
          </svg>
          Employee
        </a>
      </li>
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
        <li>
          <a class="dropdown-item text-danger" href="<?=BASE_URL . 'login/signOut'?>">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
  <script>
    let url = window.location.href;
    let parts = url.split('/');
    if (parts[5] === "employeeForm" || parts[5] === "renderEmployee") {
      $('#navEmployee').toggleClass('text-white').removeClass('text-secondary');
      $('#navDashboard').toggleClass('text-secondary').removeClass('text-white');
    } else {
      $('#navDashboard').addClass('text-white').removeClass('text-secondary');
      $('#navEmployee').addClass('text-secondary').removeClass('text-white');
    }
  </script>
</header>