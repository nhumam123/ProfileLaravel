<style>
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 58px 0 0; /* Height of navbar */
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
    width: 240px;
    z-index: 600;
}
</style>

<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="{{ route('profiles.edit') }}" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Profiles</span>
        </a>
        <a href="{{ route('educations.index') }}" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Educations</span></a
        >
        <a href="{{ route('skills.index') }}" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-chart-line fa-fw me-3"></i><span>Skillsets</span></a
        >
        <a href="{{ route('experiences.index') }}" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Experiences</span>
        </a>

      </div>
    </div>
  </nav>
  <!-- Sidebar -->
