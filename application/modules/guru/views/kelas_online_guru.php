      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">This is Example Page</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <?php $i =1;?>
              <?php foreach ($mapelL as $l) :?>
            <div class="card">
              <div class="card-header">
                <h4><?= $l['nama_matpel']; ?></h4>
              </div>
              <a href="<?= base_url('Kelas/v_kelas_online3/'. $l['id']); ?>" style="display: inline-block; text-decoration: none;">
                <div class="card-body" style="color: black;">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </a>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>
      