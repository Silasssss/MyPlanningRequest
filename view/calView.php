<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    document.getElementsByTagName("html")[0].className += " js";
  </script>
  <link rel="stylesheet" href="../public/assets/css/style.css">
  <link rel="stylesheet" href="../public/assets/css/custom.css">
  <title>EDT</title>
</head>

<body>
  <header class="cd-main-header text-center flex flex-column flex-center">


  </header>
  <div>

    <br />
    <form class="text-center" action="">

      <div class="select">
        <select name="groupe" id="group">
          <option value="D1">D1</option>
          <option value="A1">A1</option>
          <option value="A2">A2</option>
          <option value="B1">B1</option>
          <option value="B2">B2</option>
          <option value="C1">C1</option>
          <option value="C2">C2</option>
          <option value="D2">D2</option>
        </select>
      </div>


      <input id="toggle-on" class="toggle toggle-left" name="semaine" value="false" type="radio" checked>
      <label for="toggle-on" class="btn">Journée</label>
      <input id="toggle-off" class="toggle toggle-right" name="semaine" value="true" type="radio">
      <label for="toggle-off" class="btn">Semaine</label>

      <button type="submit" value="Submit" class="envoyer">Valider</button>
    </form>
  </div>
  <div class="cd-schedule cd-schedule--loading margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
      <ul>
        <li><span>08:00</span></li>
        <li><span>08:30</span></li>
        <li><span>09:00</span></li>
        <li><span>09:30</span></li>
        <li><span>10:00</span></li>
        <li><span>10:30</span></li>
        <li><span>11:00</span></li>
        <li><span>11:30</span></li>
        <li><span>12:00</span></li>
        <li><span>12:30</span></li>
        <li><span>13:00</span></li>
        <li><span>13:30</span></li>
        <li><span>14:00</span></li>
        <li><span>14:30</span></li>
        <li><span>15:00</span></li>
        <li><span>15:30</span></li>
        <li><span>16:00</span></li>
        <li><span>16:30</span></li>
        <li><span>17:00</span></li>
        <li><span>17:30</span></li>
        <li><span>18:00</span></li>
      </ul>
    </div>

    <div class="cd-schedule__events">
      <ul>
        <?php foreach ($res as $date => $cours) :  ?>
          <li class="cd-schedule__group">
            <div class="cd-schedule__top-info"><span><?php setlocale(LC_TIME, "fr_FR");
                                                      echo strftime("%A %d", strtotime($date)); ?></span></div>
            <ul>
              <?php foreach ($cours as $c) :  ?>

                <li class="cd-schedule__event">
                  <a data-start="<?= $c['debut'] ?>" data-end="<?= $c['fin'] ?>" data-content="event-1" data-event="event-<?= rand(1, 4); ?>" href="#0">
                    <em class="cd-schedule__name"><?= $c['nom'] ?></em>
                    <em class="cd-schedule__name"><?= $c['salle'] ?></em>
                  </a>
                  
                </li>

              <?php endforeach; ?>
            </ul>
          </li>

        <?php endforeach; ?>

        <!--<li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Friday</span></div>

          <ul>
            <li class="cd-schedule__event">
              <a data-start="10:00" data-end="11:00" data-content="event-rowing-workout" data-event="event-2" href="#0">
                <em class="cd-schedule__name">Rowing Workout</em>
              </a>
            </li>

            <li class="cd-schedule__event">
              <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                <em class="cd-schedule__name">Abs Circuit</em>
              </a>
            </li>

            <li class="cd-schedule__event">
              <a data-start="15:45" data-end="16:45" data-content="event-yoga-1" data-event="event-3" href="#0">
                <em class="cd-schedule__name">Yoga Level 1</em>
              </a>
            </li>
          </ul>
        </li>-->
      </ul>
    </div>

    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name"></h3>
        </div>

        <div class="cd-schedule-modal__header-bg"></div>
      </header>

      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>
        <div class="cd-schedule-modal__body-bg"></div>
      </div>

      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>

    <div class="cd-schedule__cover-layer"></div>
  </div>

  <script src="../public/assets/js/util.js"></script>
  <script src="../public/assets/js/main.js"></script>
</body>

</html>