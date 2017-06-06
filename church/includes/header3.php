<style>
  .profile-img {
    margin-top: -5px;
    margin-right: 5px;
    float: left;
    background: url(example.jpg) 50% 50% no-repeat;
    /* 50% 50% centers image in div */
    background-size: auto 100%;
    /* Interchange this value depending on prefering width vs. height */
    width: 30px;
    height: 30px;
  }
</style>
<nav class="navbar navbar-toggleable-md  navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="home.php">Church</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="leaderboard.php">Leaderboard</a>
      </li> 
    </ul>
    <ul class="nav navbar-nav pull-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <!-- The Profile picture inserted via div class below, with shaping provided by Bootstrap -->
          <div class="img-rounded profile-img"></div>
          <?php echo $_SESSION["username"]; ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
        <!--<li>
            <a href="#">Settings</a>
          </li>-->
          <li role="separator" class="divider"></li>
          <li>
            <a href="logout.php">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
    </form>
  </div>
</nav>